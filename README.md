# School admissions system (PPDB)

An online new-student registration system for Yayasan Nurul Huda, a school foundation in Lampung, Indonesia. Students are registered for primary, junior high, senior high or vocational school; staff see the applications in a table and print a student's data sheet.

Built during my bachelor's internship (Kerja Praktik), Sumatra Institute of Technology, January to April 2020, with one other student. PPDB stands for *Penerimaan Peserta Didik Baru* (new student admissions).

## Features

- Registration forms for each school level (SD, SMP, SMA, SMK)
- Admin table of applications with search, sort and inline editing (jqGrid)
- Recap table of registrations
- Printable student data sheet, and a PDF export of the list (FPDF)

## Stack

| Part | Tech |
|---|---|
| Backend | PHP, MySQL |
| Frontend | jQuery, jQuery UI, jqGrid, AdminLTE 3 and Metro UI templates |
| PDF | FPDF |

## My part

I made 14 of the 19 commits (not counting merges): the registration recap table (`Tabel/`), the printable student data sheet (`Print/`, an HTML page for the browser's print) and the database connection. My teammate built the registration forms, the jqGrid table in `src-ppdb` and the FPDF export.

## Run locally

Needs **PHP 5.6** and MySQL (for example an older XAMPP). Parts of the code use the `mysql_*` functions that were removed in PHP 7, so it will not run on a current PHP without changes.

1. Copy the repo into your web root.
2. Database settings: `src-ppdb/config/jq-config.php`, `Print/koneksi.php` and `Tabel/koneksi.php` (default `root`, no password). Most pages use the database `db_dashboard`; `Tabel/` points to `test`.
3. Open `index.html` in the browser through the local server.

The schema for `db_dashboard` (for example the `tb_siswa` student table) was never committed, so the database has to be recreated by hand before the data pages work.

## Note

Kept as it was in 2020. Some pages were still work in progress when the internship ended (the print page, for example, loads a fixed test student ID). The UI text is in Indonesian. AdminLTE, Metro UI, jqGrid and FPDF are third-party libraries committed into the repo, which is why it is large.
