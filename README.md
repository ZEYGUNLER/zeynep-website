# 🌿 Dijital Bahçe (Web)

## 📖 Proje Hakkında

"Dijital Bahçe", okuma deneyimini oyunlaştıran kişisel bir web platformudur. Kullanıcılar makaleleri okudukça profillerindeki bahçe çiçeklenir ve dijital bir kütüphane/bahçe oluştururlar.

## 👩‍💻 Geliştirici Bilgileri

- **Ad Soyad:** Zeynep Güneş
- **Öğrenci No:** 220541030
- **Bölüm:** Yazılım Mühendisliği

## 🛠 Kullanılan Teknolojiler

- **Framework:** Laravel 11
- **Veritabanı:** SQLite / MySQL
- **Tasarım:** Tailwind CSS
- **Admin Paneli:** Filament PHP
- **Yerel Sunucu:** Laravel Herd

## 🚀 Kurulum Talimatları

Projeyi yerel bilgisayarınızda çalıştırmak için:

1. Depoyu klonlayın:
   ```bash
   git clone [https://github.com/ZEYGUNLER/zeynep-website.git](https://github.com/ZEYGUNLER/zeynep-website.git)
---

---

## LAB-3 CSS Kararları Raporu

Bu bölüm, projenin responsive tasarım sürecinde alınan teknik kararları içermektedir.

* **Design Tokens:** Renk paletinde `soft-lilac` ve `charcoal` tercih edilerek modern bir kontrast yakalanmıştır. Boşluklar için `rem` birimleri kullanılarak tutarlılık sağlanmıştır.
* **Tipografi:** Başlıklarda `clamp()` kullanılarak akıcı (fluid) büyüme sağlanmış, böylece her cihazda okunabilirlik korunmuştur.
* **Layout:** Navigasyonda esneklik için **Flexbox**, içerik kartları ve form yerleşiminde ise hizalama disiplini için **CSS Grid** yapısı kullanılmıştır.
* **Responsive:** Mobile-first yaklaşımıyla, Tailwind'in `md` ve `lg` kırılma noktaları üzerinden 3 farklı ekran boyutu için optimizasyon yapılmıştır.
