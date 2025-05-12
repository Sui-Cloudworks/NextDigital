/**
 * Custom scripts for the theme
 */
(function($) {
    // ドキュメント読み込み完了時
    $(document).ready(function() {
        
        // スムーズスクロール
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            var target = this.hash;
            var $target = $(target);
            
            if ($target.length) {
                $('html, body').animate({
                    'scrollTop': $target.offset().top - 80
                }, 800, 'swing');
            }
        });
        
        // アニメーション効果
        $(window).on('scroll', function() {
            $('.fade-in').each(function() {
                var position = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                
                if (scroll > position - windowHeight + 100) {
                    $(this).addClass('visible');
                }
            });
        });
        
        // 初期読み込み時のアニメーション
        setTimeout(function() {
            $(window).trigger('scroll');
        }, 100);
    });
})(jQuery);