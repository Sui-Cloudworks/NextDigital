// js/custom.js またはナビゲーションスクリプトに追加
document.addEventListener('DOMContentLoaded', function() {
  // アンカーリンクをクリックした時の処理
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      
      const targetElement = document.querySelector(targetId);
      if (!targetElement) return;
      
      const headerHeight = document.querySelector('.site-header').offsetHeight;
      const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
      
      window.scrollTo({
        top: targetPosition - headerHeight - 20, // ヘッダーの高さ + 余白
        behavior: 'smooth'
      });
    });
  });
  
  // URLにハッシュがある場合の処理（ページ読み込み時）
  if (window.location.hash) {
    const headerHeight = document.querySelector('.site-header').offsetHeight;
    const targetElement = document.querySelector(window.location.hash);
    
    if (targetElement) {
      setTimeout(function() {
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
        window.scrollTo({
          top: targetPosition - headerHeight - 20,
          behavior: 'smooth'
        });
      }, 100);
    }
  }
});