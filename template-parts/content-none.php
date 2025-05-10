<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title">何も見つかりませんでした</h1>
    </header>

    <div class="page-content">
        <?php
        if (is_search()) :
            ?>
            <p>検索条件に一致するものが見つかりませんでした。別のキーワードで試してください。</p>
            <?php
            get_search_form();
        else :
            ?>
            <p>お探しのコンテンツが見つかりませんでした。検索をお試しください。</p>
            <?php
            get_search_form();
        endif;
        ?>
    </div>
</section>