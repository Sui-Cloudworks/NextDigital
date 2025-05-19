/**
 * News cards functionality
 * - Height equalization for cards in the same row
 * - Responsive grid adjustments
 */

(function($) {
    'use strict';
    
    /**
     * Equal height functionality for cards in the same row
     */
    function equalizeCardHeights() {
        if (window.innerWidth >= 768) { // Only on tablet and above
            // Reset heights first
            $('.news-item').css('height', 'auto');
            
            // Group cards by rows
            var cards = $('.news-item');
            var rows = [];
            var rowWidth = 0;
            var currentRow = [];
            var containerWidth = $('.news-grid').width() || $('.news-list').width();
            
            cards.each(function() {
                var cardWidth = $(this).outerWidth(true);
                
                if (rowWidth + cardWidth > containerWidth) {
                    // New row
                    rows.push(currentRow);
                    currentRow = [$(this)];
                    rowWidth = cardWidth;
                } else {
                    // Same row
                    currentRow.push($(this));
                    rowWidth += cardWidth;
                }
            });
            
            // Add the last row
            if (currentRow.length > 0) {
                rows.push(currentRow);
            }
            
            // Set equal heights per row
            rows.forEach(function(row) {
                var maxHeight = 0;
                
                // Find the tallest card in this row
                row.forEach(function(card) {
                    var height = card.outerHeight();
                    maxHeight = Math.max(maxHeight, height);
                });
                
                // Set all cards in this row to the tallest height
                row.forEach(function(card) {
                    card.css('height', maxHeight + 'px');
                });
            });
        } else {
            // Reset heights on mobile
            $('.news-item').css('height', 'auto');
        }
    }
    
    // Run on document ready
    $(document).ready(function() {
        equalizeCardHeights();
        
        // Run on window resize
        $(window).resize(function() {
            equalizeCardHeights();
        });
        
        // Run on images load to handle dynamic height changes
        $('.news-image img').on('load', function() {
            equalizeCardHeights();
        });
    });
    
})(jQuery);