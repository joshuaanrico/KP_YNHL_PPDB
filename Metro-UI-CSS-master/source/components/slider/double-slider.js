var DoubleSliderDefaultConfig = {
    roundValue: true,
    min: 0,
    max: 100,
    accuracy: 0,
    showMinMax: false,
    minMaxPosition: Metro.position.TOP,
    valueMin: null,
    valueMax: null,
    hint: false,
    hintAlways: false,
    hintPositionMin: Metro.position.TOP,
    hintPositionMax: Metro.position.TOP,
    hintMaskMin: "$1",
    hintMaskMax: "$1",
    target: null,
    size: 0,

    clsSlider: "",
    clsBackside: "",
    clsComplete: "",
    clsMarker: "",
    clsMarkerMin: "",
    clsMarkerMax: "",
    clsHint: "",
    clsHintMin: "",
    clsHintMax: "",
    clsMinMax: "",
    clsMin: "",
    clsMax: "",

    onStart: Metro.noop,
    onStop: Metro.noop,
    onMove: Metro.noop,
    onChange: Metro.noop,
    onChangeValue: Metro.noop,
    onFocus: Metro.noop,
    onBlur: Metro.noop,
    onDoubleSliderCreate: Metro.noop
};

Metro.doubleSliderSetup = function (options) {
    DoubleSliderDefaultConfig = $.extend({}, DoubleSliderDefaultConfig, options);
};

if (typeof window["metroDoubleSliderSetup"] !== undefined) {
    Metro.doubleSliderSetup(window["metroDoubleSliderSetup"]);
}

var DoubleSlider = {
    init: function( options, elem ) {
        this.options = $.extend( {}, DoubleSliderDefaultConfig, options );
        this.elem  = elem;
        this.element = $(elem);
        this.slider = null;
        this.valueMin = null;
        this.valueMax = null;
        this.keyInterval = false;

        this._setOptionsFromDOM();
        this._create();

        return this;
    },

    _setOptionsFromDOM: function(){
        var element = this.element, o = this.options;

        $.each(element.data(), function(key, value){
            if (key in o) {
                try {
                    o[key] = JSON.parse(value);
                } catch (e) {
                    o[key] = value;
                }
            }
        });
    },

    _create: function(){
        var element = this.element, o = this.options;

        Metro.checkRuntime(element, "doubleslider");

        this.valueMin = Utils.isValue(o.valueMin) ? +o.valueMin : +o.min;
        this.valueMax = Utils.isValue(o.valueMax) ? +o.valueMax : +o.max;

        this._createSlider();
        this._createEvents();

        this.val(this.valueMin, this.valueMax);

        Utils.exec(o.onDoubleSliderCreate, null, element[0]);
        element.fire("doubleslidercreate");
    },

    _createSlider: function(){
        var element = this.element, o = this.options;
        var slider = $("<div>").addClass("slider").addClass(o.clsSlider).addClass(this.elem.className);
        var backside = $("<div>").addClass("backside").addClass(o.clsBackside);
        var complete = $("<div>").addClass("complete").addClass(o.clsComplete);
        var markerMin = $("<button>").attr("type", "button").addClass("marker marker-min").addClass(o.clsMarker).addClass(o.clsMarkerMin);
        var markerMax = $("<button>").attr("type", "button").addClass("marker marker-max").addClass(o.clsMarker).addClass(o.clsMarkerMax);
        var hintMin = $("<div>").addClass("hint hint-min").addClass(o.hintPositionMin + "-side").addClass(o.clsHint).addClass(o.clsHintMin);
        var hintMax = $("<div>").addClass("hint hint-max").addClass(o.hintPositionMax + "-side").addClass(o.clsHint).addClass(o.clsHintMax);
        var id = Utils.elementId("slider");
        var i;

        Metro.checkRuntime(element, "doubleslider");

        slider.attr("id", id);

        if (o.size > 0) {
            slider.outerWidth(o.size);
        }

        slider.insertBefore(element);
        element.appendTo(slider);
        backside.appendTo(slider);
        complete.appendTo(slider);
        markerMin.appendTo(slider);
        markerMax.appendTo(slider);
        hintMin.appendTo(markerMin);
        hintMax.appendTo(markerMax);

        if (o.hintAlways === true) {
            $([hintMin, hintMax]).css({
                display: "block"
            }).addClass("permanent-hint");
        }

        if (o.showMinMax === true) {
            var min_max_wrapper = $("<div>").addClass("slider-min-max clear").addClass(o.clsMinMax);
            $("<span>").addClass("place-left").addClass(o.clsMin).html(o.min).appendTo(min_max_wrapper);
            $("<span>").addClass("place-right").addClass(o.clsMax).html(o.max).appendTo(min_max_wrapper);
            if (o.minMaxPosition === Metro.position.TOP) {
                min_max_wrapper.insertBefore(slider);
            } else {
                min_max_wrapper.insertAfter(slider);
            }
        }

        element[0].className = '';
        if (o.copyInlineStyles === true) {
            for (i = 0; i < element[0].style.length; i++) {
                slider.css(element[0].style[i], element.css(element[0].style[i]));
            }
        }

        if (element.is(":disabled")) {
            this.disable();
        } else {
            this.enable();
        }

        this.slider = slider;
    },

    _createEvents: function(){
        var that = this, element = this.element, slider = this.slider, o = this.options;
        var marker = slider.find(".marker");

        marker.on(Metro.events.startAll, function(){
            var _marker = $(this);
            var hint = _marker.find(".hint");
            if (o.hint === true && o.hintAlways !== true) {
                hint.fadeIn(300);
            }

            $(document).on(Metro.events.moveAll, function(e){
                that._move(e);
                Utils.exec(o.onMove, [that.valueMin, that.valueMax], element[0]);
                element.fire("move", {
                    val: [that.valueMin, that.valueMax]
                });
            }, {ns: slider.attr("id")});

            $(document).on(Metro.events.stopAll, function(){
                $(document).off(Metro.events.moveAll, {ns: slider.attr("id")});
                $(document).off(Metro.events.stopAll, {ns: slider.attr("id")});

                if (o.hintAlways !== true) {
                    hint.fadeOut(300);
                }

                Utils.exec(o.onStop, [that.valueMin, that.valueMax], element[0]);
                element.fire("stop", {
                    val: [that.valueMin, that.valueMax]
                });
            }, {ns: slider.attr("id")});

            Utils.exec(o.onStart, [that.valueMin, that.valueMax], element[0]);
            element.fire("start", {
                val: [that.valueMin, that.valueMax]
            });
        });

        marker.on(Metro.events.focus, function(){
            Utils.exec(o.onFocus, [that.valueMin, that.valueMax], element[0]);
            element.fire("focus", {
                val: [that.valueMin, that.valueMax]
            });
        });

        marker.on(Metro.events.blur, function(){
            Utils.exec(o.onBlur, [that.valueMin, that.valueMax], element[0]);
            element.fire("blur", {
                val: [that.valueMin, that.valueMax]
            });
        });

        $(window).on(Metro.events.resize,function(){
            that.val(that.valueMin, that.valueMax);
        }, {ns: slider.attr("id")});
    },

    _convert: function(v, how){
        var slider = this.slider, o = this.options;
        var length = slider.outerWidth() - slider.find(".marker").outerWidth();
        switch (how) {
            case "pix2prc": return ( v * 100 / length );
            case "pix2val": return ( this._convert(v, 'pix2prc') * ((o.max - o.min) / 100) + o.min );
            case "val2prc": return ( (v - o.min)/( (o.max - o.min) / 100 )  );
            case "prc2pix": return ( v / ( 100 / length ));
            case "val2pix": return ( this._convert(this._convert(v, 'val2prc'), 'prc2pix') );
        }

        return 0;
    },

    _correct: function(value){
        var res = value;
        var accuracy  = this.options.accuracy;
        var min = this.options.min, max = this.options.max;
        var _dec = function(v){
            return v % 1 === 0 ? 0 : v.toString().split(".")[1].length;
        };

        if (accuracy === 0 || isNaN(accuracy)) {
            return res;
        }

        res = Math.round(value/accuracy)*accuracy;

        if (res < min) {
            res = min;
        }

        if (res > max) {
            res = max;
        }

        return res.toFixed(_dec(accuracy));
    },

    _move: function(e){
        var isMin = $(e.target).hasClass("marker-min");
        var slider = this.slider, o = this.options;
        var offset = slider.offset(),
            marker_size = slider.find(".marker").outerWidth(),
            markerMin = slider.find(".marker-min"),
            markerMax = slider.find(".marker-max"),
            length = slider.outerWidth(),
            cPix, cStart, cStop;

        cPix = Utils.pageXY(e).x - offset.left - marker_size / 2;

        if (isMin) {
            cStart = 0;
            cStop = parseInt(markerMax.css("left")) - marker_size;
        } else {
            cStart = parseInt(markerMin.css("left")) + marker_size;
            cStop = length - marker_size;
        }

        if (cPix < cStart || cPix > cStop) {
            return ;
        }

        this[isMin ? "valueMin" : "valueMax"] = this._correct(this._convert(cPix, 'pix2val'));

        this._redraw();
    },

    _hint: function(){
        var that = this, o = this.options, slider = this.slider, hint = slider.find(".hint");

        hint.each(function(){
            var _hint = $(this);
            var isMin = _hint.hasClass("hint-min");
            var _mask = isMin ? o.hintMaskMin : o.hintMaskMax;
            var value = +(isMin ? that.valueMin : that.valueMax) || 0;
            _hint.text(_mask.replace("$1", value.toFixed(Utils.decCount(o.accuracy))))
        });
    },

    _value: function(){
        var element = this.element, o = this.options;
        var v1 = +this.valueMin || 0, v2 = +this.valueMax || 0;
        var value;// = [this.valueMin, this.valueMax].join(", ");

        if (o.roundValue) {
            v1 = v1.toFixed(Utils.decCount(o.accuracy));
            v2 = v2.toFixed(Utils.decCount(o.accuracy));
        }

        value = [v1, v2].join(", ");

        if (element[0].tagName === "INPUT") {
            element.val(value);
        }

        if (o.target !== null) {
            var target = $(o.target);
            if (target.length !== 0) {

                $.each(target, function(){
                    var t = $(this);
                    if (this.tagName === "INPUT") {
                        t.val(value);
                    } else {
                        t.text(value);
                    }
                    t.trigger("change");
                });
            }
        }

        Utils.exec(o.onChangeValue, [value], element[0]);
        element.fire("changevalue", {
            val: value
        });

        Utils.exec(o.onChange, [value], element[0]);
        element.fire("change", {
            val: value
        });
    },

    _marker: function(){
        var slider = this.slider, o = this.options;
        var markerMin = slider.find(".marker-min");
        var markerMax = slider.find(".marker-max");
        var complete = slider.find(".complete");
        var marker_size = parseInt(Utils.getStyleOne(markerMin, "width"));
        var slider_visible = Utils.isVisible(slider);

        if (slider_visible) {
            $([markerMin, markerMax]).css({
                'margin-top': 0,
                'margin-left': 0
            });
        }

        if (slider_visible) {
            markerMin.css('left', this._convert(this.valueMin, 'val2pix'));
            markerMax.css('left', this._convert(this.valueMax, 'val2pix'));
        } else {
            markerMin.css({
                'left': (this._convert(this.valueMin, 'val2prc')) + "%",
                'margin-top': this._convert(this.valueMin, 'val2prc') === 0 ? 0 : -1 * marker_size / 2
            });
            markerMax.css({
                'left': (this._convert(this.valueMax, 'val2prc')) + "%",
                'margin-top': this._convert(this.valueMax, 'val2prc') === 0 ? 0 : -1 * marker_size / 2
            });
        }

        complete.css({
            "left": this._convert(this.valueMin, 'val2pix'),
            "width": this._convert(this.valueMax, 'val2pix') - this._convert(this.valueMin, 'val2pix')
        });
    },

    _redraw: function(){
        this._marker();
        this._value();
        this._hint();
    },

    val: function(vMin, vMax){
        var o = this.options;

        if (!Utils.isValue(vMin) && !Utils.isValue(vMax)) {
            return [this.valueMin, this.valueMax];
        }

        if (vMin < o.min) vMin = o.min;
        if (vMax < o.min) vMax = o.min;

        if (vMin > o.max) vMin = o.max;
        if (vMax > o.max) vMax = o.max;

        this.valueMin = this._correct(vMin);
        this.valueMax = this._correct(vMax);

        this._redraw();
    },

    changeValue: function(){
        var element = this.element;
        var valMin = +element.attr("data-value-min");
        var valMax = +element.attr("data-value-max");
        this.val(valMin, valMax);
    },

    disable: function(){
        var element = this.element;
        element.data("disabled", true);
        element.parent().addClass("disabled");
    },

    enable: function(){
        var element = this.element;
        element.data("disabled", false);
        element.parent().removeClass("disabled");
    },

    toggleState: function(){
        if (this.elem.disabled) {
            this.disable();
        } else {
            this.enable();
        }
    },

    changeAttribute: function(attributeName){
        switch (attributeName) {
            case "data-value-min": this.changeValue(); break;
            case "data-value-max": this.changeValue(); break;
            case 'disabled': this.toggleState(); break;
        }
    },

    destroy: function(){
        var element = this.element, slider = this.slider;
        var marker = slider.find(".marker");

        marker.off(Metro.events.startAll);
        marker.off(Metro.events.focus);
        marker.off(Metro.events.blur);
        marker.off(Metro.events.keydown);
        marker.off(Metro.events.keyup);
        slider.off(Metro.events.click);
        $(window).off(Metro.events.resize, {ns: slider.attr("id")});

        return element;
    }
};

Metro.plugin('doubleslider', DoubleSlider);