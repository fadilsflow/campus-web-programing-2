table produk spek
 harus memiliki kolom-kolom berikut dengan spesifikasi tipe data dan
constraint yang sesuai:
1. id:
○ Tipe data: unsignedBigInteger
○ Primary Key
○ Auto-increment
2. name:
○ Tipe data: string
○ Panjang maksimal: 255 karakter
○ Tidak boleh kosong (required)
3. slug:
○ Tipe data: string
○ Panjang maksimal: 255 karakter
○ Harus unik (unique index)
○ Digunakan untuk URL produk yang SEO-friendly
4. description:
○ Tipe data: text
○ Digunakan untuk deskripsi lengkap produk
○ Boleh kosong (nullable)
5. sku (Stock Keeping Unit):
○ Tipe data: string
○ Panjang maksimal: 50 karakter
○ Harus unik (unique index)
○ Digunakan sebagai kode identifikasi unik untuk setiap produk
6. price:
○ Tipe data: decimal
○ Presisi: 10
○ Skala: 2 (misalnya, 12345678.90)
○ Harus lebih besar dari atau sama dengan 0
7. stock:
○ Tipe data: integer
○ Nilai default: 0
○ Harus lebih besar dari atau sama dengan 0
8. product_category_id:
○ Tipe data: unsignedBigInteger
○ Foreign Key yang mengacu pada kolom id di tabel product_categories
(asumsi tabel ini sudah ada)
○ Boleh kosong (nullable)
○ Tambahkan constraint foreign key dengan opsi ON DELETE SET
NULL dan ON UPDATE CASCADE
9. image_url:
○ Tipe data: string
○ Panjang maksimal: 255 karakter
○ Boleh kosong (nullable)
○ Digunakan untuk menyimpan URL gambar produk
10. is_active:
○ Tipe data: boolean
○ Nilai default: true
○ Digunakan untuk menandai apakah produk aktif atau tidak
11. created_at:
○ Tipe data: timestamp (akan diurus otomatis oleh Laravel)
12. updated_at:
○ Tipe data: timestamp (akan diurus otomatis oleh Laravel)
