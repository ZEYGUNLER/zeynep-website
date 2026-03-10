import './bootstrap';
import '../css/app.css';

import React from 'react';
import { createRoot } from 'react-dom/client';

/**
 * LAB-4 GÖREVİ: BUTTON COMPONENT
 */
function Button({ children, variant = "primary", className = "", ...props }) {
  const baseStyles = "transition-all duration-300 transform active:scale-95 font-medium";
  const variants = {
    primary: "bg-[#2D3139] text-white px-10 py-3 rounded-full shadow-lg hover:bg-black",
    secondary: "bg-[#2D3139] text-white px-6 py-2 rounded-full hover:opacity-90",
    ghost: "text-gray-600 hover:text-black px-4",
    outline: "border border-gray-300 text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50"
  };

  return (
    <button className={`${baseStyles} ${variants[variant]} ${className}`} {...props}>
      {children}
    </button>
  );
}

/**
 * LAB-4 GÖREVİ: CARD COMPONENT
 */
function Card({ title, date, excerpt, variant = "elevated" }) {
  const baseStyles = "p-8 rounded-[2rem] transition-all duration-500 group cursor-pointer h-full flex flex-col";
  const variants = {
    elevated: "bg-white border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-2",
    outlined: "bg-transparent border-2 border-gray-100 hover:border-indigo-100",
    filled: "bg-[#F5F3FF] border-none hover:bg-[#EDE9FE]"
  };

  return (
    <div className={`${baseStyles} ${variants[variant]}`}>
      <span className="text-[10px] tracking-widest text-[#A78BFA] font-bold uppercase block mb-4">
        {date}
      </span>
      <h3 className="text-2xl font-serif italic text-gray-800 mb-4 group-hover:text-[#4C438E] transition-colors leading-tight">
        {title}
      </h3>
      <p className="text-gray-500 font-light leading-relaxed line-clamp-3 mb-6">
        {excerpt}
      </p>
      <div className="mt-auto flex items-center text-sm font-medium text-[#4C438E] opacity-0 group-hover:opacity-100 transition-opacity">
        Devamını Oku <span className="ml-2">→</span>
      </div>
    </div>
  );
}

function App() {
  // LAB-4: Liste verisi ile çalışma (Dinamik Render)
  const posts = [
    { id: 1, date: "12 MART 2026", title: "Yapay Zeka ve Estetik", excerpt: "Algoritmaların dijital bahçelerimizdeki rolü üzerine...", variant: "elevated" },
    { id: 2, date: "10 MART 2026", title: "Minimalist Kod Yazımı", excerpt: "Daha az kodla daha çok iş yapmanın yollarını arıyoruz.", variant: "outlined" },
    { id: 3, date: "08 MART 2026", title: "Tasarım Sistemleri", excerpt: "V0 ve Tailwind kullanarak nasıl ölçeklenebilir yapılar kurulur?", variant: "filled" },
  ];

  return (
    <div className="min-h-screen bg-[#FDFDFD] font-sans text-[#1A1A1A]">
      
      {/* HEADER */}
      <nav className="flex justify-between items-center px-16 py-8">
        <div className="text-2xl font-serif font-bold tracking-tight">Zeynep.</div>
        <div className="flex items-center gap-8 text-sm">
          <a href="#" className="text-gray-600 hover:text-black">İletişim</a>
          <a href="#" className="text-gray-600 hover:text-black">Giriş Yap</a>
          <Button variant="secondary">Kayıt Ol</Button>
        </div>
      </nav>

      {/* HERO SECTION */}
      <main className="flex flex-col items-center justify-center pt-32 pb-20 text-center px-4">
        <span className="text-[10px] tracking-[0.4em] text-[#A78BFA] font-bold uppercase mb-8 bg-[#F5F3FF] px-6 py-1.5 rounded-full border border-[#EDE9FE]">
          Kişisel Blog & Araştırma Notları
        </span>
        
        <h1 className="text-[84px] font-serif italic text-[#4C438E]/90 leading-tight mb-6">
          Dijital bahçeme <br /> hoşgeldiniz.
        </h1>
        
        <p className="max-w-xl text-gray-500 text-xl mb-12 font-light leading-relaxed">
          Burada fikir tohumları ekiyor, araştırma notlarımı <br /> 
          yeşertiyor ve öğrendiklerimi paylaşıyorum.
        </p>

        <Button variant="primary">Okumaya Başla</Button>
      </main>

      {/* SON YEŞERENLER (GRID YAPISI EKLENDİ) */}
      <section className="px-16 py-20 bg-gray-50/50">
        <div className="max-w-6xl mx-auto">
          <h2 className="text-4xl font-serif italic text-gray-800 mb-2">
            Son Yeşerenler
          </h2>
          <div className="h-[1px] bg-gray-200 w-full mt-6 mb-12"></div>
          
          {/* Responsive Grid: Mobilde 1, Tablette 2, Masaüstünde 3 sütun */}
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {posts.map(post => (
              <Card 
                key={post.id}
                date={post.date}
                title={post.title}
                excerpt={post.excerpt}
                variant={post.variant}
              />
            ))}
          </div>
        </div>

        {/* LAB-4 Varyant Test Paneli */}
        <div className="mt-24 flex flex-col items-center">
          <div className="p-4 bg-white border border-gray-100 rounded-2xl inline-flex gap-4 items-center shadow-sm">
            <span className="text-[10px] text-gray-400 font-mono uppercase tracking-widest">Lab-4 Control:</span>
            <Button variant="outline" className="text-xs">Yeni Taslak</Button>
            <Button variant="ghost" className="text-xs text-red-400">Arşivle</Button>
          </div>
        </div>
      </section>

    </div>
  );
}

const rootElement = document.getElementById('app');
if (rootElement) {
    createRoot(rootElement).render(<App />);
}