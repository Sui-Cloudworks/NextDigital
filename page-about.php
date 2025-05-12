<?php
/**
 * Template Name: About Page
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main about-page">
    <!-- ページヒーローセクション -->
    <?php get_template_part('template-parts/page-hero'); ?>

    <!-- 会社概要セクション -->
    <section class="company-overview">
        <div class="container-inner">
            <h2 class="section-title">
                <?php
                if (function_exists('get_field') && get_field('overview_title')) {
                    echo esc_html(get_field('overview_title'));
                } else {
                    echo '会社概要';
                }
                ?>
            </h2>
            
            <!-- 編集可能なコンテンツ領域 -->
            <div class="company-overview-content">
                <?php the_content(); ?>
            </div>
            
            <div class="company-philosophy">
                <div class="philosophy-grid">
                    <div class="philosophy-item">
                        <h3 class="philosophy-title">
                            <?php
                            if (function_exists('get_field') && get_field('philosophy_title')) {
                                echo esc_html(get_field('philosophy_title'));
                            } else {
                                echo '企業理念';
                            }
                            ?>
                        </h3>
                        <p class="philosophy-description">
                            <?php
                            if (function_exists('get_field') && get_field('philosophy_description')) {
                                echo esc_html(get_field('philosophy_description'));
                            } else {
                                echo 'デジタルの力で人々の生活と奉仕の集会社会に驚きと感動を想像し、より豊かな未来を実現する。';
                            }
                            ?>
                        </p>
                    </div>
                    
                    <div class="philosophy-item">
                        <h3 class="philosophy-title">
                            <?php
                            if (function_exists('get_field') && get_field('vision_title')) {
                                echo esc_html(get_field('vision_title'));
                            } else {
                                echo 'ビジョン';
                            }
                            ?>
                        </h3>
                        <p class="philosophy-description">
                            <?php
                            if (function_exists('get_field') && get_field('vision_description')) {
                                echo esc_html(get_field('vision_description'));
                            } else {
                                echo 'テクノロジーとクリエイティブの融合により、新たな価値を想像し続けるイノベーションパートナーになる。';
                            }
                            ?>
                        </p>
                    </div>
                    
                    <div class="philosophy-item">
                        <h3 class="philosophy-title">
                            <?php
                            if (function_exists('get_field') && get_field('mission_title')) {
                                echo esc_html(get_field('mission_title'));
                            } else {
                                echo 'ミッション';
                            }
                            ?>
                        </h3>
                        <p class="philosophy-description">
                            <?php
                            if (function_exists('get_field') && get_field('mission_description')) {
                                echo esc_html(get_field('mission_description'));
                            } else {
                                echo '最先端のデジタル技術と専門知識を活用し、お客様のビジネス課題を解決し、持続的な成長を支援する。';
                            }
                            ?>
                        </p>
                    </div>
                </div>
                
                <table class="company-info-table">
                    <?php if (function_exists('get_field')): ?>
                        <?php if (get_field('company_name')): ?>
                        <tr>
                            <th>会社名</th>
                            <td><?php echo esc_html(get_field('company_name')); ?></td>
                        </tr>
                        <?php endif; ?>
                        
                        <?php if (get_field('company_established')): ?>
                        <tr>
                            <th>設立</th>
                            <td><?php echo esc_html(get_field('company_established')); ?></td>
                        </tr>
                        <?php endif; ?>
                        
                        <?php if (get_field('company_ceo')): ?>
                        <tr>
                            <th>代表取締役</th>
                            <td><?php echo esc_html(get_field('company_ceo')); ?></td>
                        </tr>
                        <?php endif; ?>
                        
                        <?php if (get_field('company_capital')): ?>
                        <tr>
                            <th>資本金</th>
                            <td><?php echo esc_html(get_field('company_capital')); ?></td>
                        </tr>
                        <?php endif; ?>
                        
                        <?php if (get_field('company_employees')): ?>
                        <tr>
                            <th>従業員数</th>
                            <td><?php echo esc_html(get_field('company_employees')); ?></td>
                        </tr>
                        <?php endif; ?>
                        
                        <?php if (get_field('company_business')): ?>
                        <tr>
                            <th>事業内容</th>
                            <td><?php echo wp_kses_post(get_field('company_business')); ?></td>
                        </tr>
                        <?php endif; ?>
                        
                        <?php if (get_field('company_address')): ?>
                        <tr>
                            <th>所在地</th>
                            <td><?php echo nl2br(esc_html(get_field('company_address'))); ?></td>
                        </tr>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- ACFがない場合のデフォルト表示 -->
                        <tr>
                            <th>会社名</th>
                            <td>株式会社Nexus Digital （ネクサスデジタル）</td>
                        </tr>
                        <tr>
                            <th>設立</th>
                            <td>2015年4月1日</td>
                        </tr>
                        <tr>
                            <th>代表取締役</th>
                            <td>山田 太郎</td>
                        </tr>
                        <tr>
                            <th>資本金</th>
                            <td>1億円</td>
                        </tr>
                        <tr>
                            <th>従業員数</th>
                            <td>120名（2023年4月現在）</td>
                        </tr>
                        <tr>
                            <th>事業内容</th>
                            <td>
                                <ul>
                                    <li>デジタルマーケティング</li>
                                    <li>Webサイト・アプリケーション開発</li>
                                    <li>DXコンサルティング</li>
                                    <li>データ分析・活用支援</li>
                                    <li>クラウドインフラ構築・運用</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>所在地</th>
                            <td>
                                〒106-0032<br>
                                東京都港区六本木6-10-1<br>
                                六本木森ビルタワー 23F
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </section>

    <!-- 沿革セクション -->
    <section class="company-history">
        <div class="container-inner">
            <h2 class="section-title">
                <?php
                if (function_exists('get_field') && get_field('history_title')) {
                    echo esc_html(get_field('history_title'));
                } else {
                    echo '沿革';
                }
                ?>
            </h2>
            
            <div class="history-container">
                <?php if (function_exists('get_field') && get_field('history_content')): ?>
                    <div class="history-timeline custom-timeline">
                        <?php echo wp_kses_post(get_field('history_content')); ?>
                    </div>
                <?php else: ?>
                    <!-- デフォルトの沿革アイテム -->
                    <div class="history-timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">2015年4月</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">会社設立</h3>
                                <p class="timeline-description">東京都渋谷区に株式会社Nexus Digitalを設立。Webサイト制作とデジタルマーケティング事業を開始。</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-date">2016年7月</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">事業拡大</h3>
                                <p class="timeline-description">モバイルアプリケーション開発事業を開始。開発チームを拡充。</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-date">2017年10月</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">オフィス移転</h3>
                                <p class="timeline-description">事業拡大に伴い、東京都港区の現在のオフィスに移転。</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-date">2018年5月</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">資本金増資</h3>
                                <p class="timeline-description">資本金を5,000万円に増資。経営基盤を強化。</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-date">2021年4月</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">データ分析事業部設立</h3>
                                <p class="timeline-description">AI・データ分析専門の事業部を設立。データドリブン経営支援サービスを開始。</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-date">2022年9月</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">資本金増資</h3>
                                <p class="timeline-description">資本金を1億円に増資。大型プロジェクトへの対応力を強化。</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-date">2023年1月</div>
                            <div class="timeline-content">
                                <h3 class="timeline-title">クラウド事業強化</h3>
                                <p class="timeline-description">クラウドインフラ構築・運用支援事業を強化。専門チームを編成。</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- アクセスセクション -->
    <section class="company-access">
        <div class="container-inner">
            <h2 class="section-title">
                <?php
                if (function_exists('get_field') && get_field('access_title')) {
                    echo esc_html(get_field('access_title'));
                } else {
                    echo 'アクセス';
                }
                ?>
            </h2>
            
            <div class="access-container">
                <div class="access-map">
                    <?php 
                    if (function_exists('get_field') && get_field('map_embed')) {
                        echo get_field('map_embed');
                    } else {
                        // デフォルトのGoogle Mapの埋め込みコード
                        echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.6957879856983!2d139.72731867571894!3d35.66043132955094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b771049e193%3A0x3eb92548e3809e36!2z5YWt5pys5pyo5qOu5p2x44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1683969587566!5m2!1sja!2sjp" width="896" height="384" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
                    }
                    ?>
                </div>
                
                <h3 class="access-office-title">
                    <?php
                    if (function_exists('get_field') && get_field('office_title')) {
                        echo esc_html(get_field('office_title'));
                    } else {
                        echo '本社';
                    }
                    ?>
                </h3>
                
                <div class="access-info">
                    <div class="access-contact">
                        <div class="access-item">
                            <div class="access-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="access-content">
                                <h4 class="access-subtitle">住所</h4>
                                <p class="access-text">
                                    <?php
                                    if (function_exists('get_field') && get_field('office_address')) {
                                        echo nl2br(esc_html(get_field('office_address')));
                                    } else {
                                        echo '〒106-0032<br>東京都港区六本木6-10-1<br>六本木ヒルズ森タワー 23F';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="access-item">
                            <div class="access-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="access-content">
                                <h4 class="access-subtitle">電話番号</h4>
                                <p class="access-text">
                                    <?php
                                    if (function_exists('get_field') && get_field('office_phone')) {
                                        echo esc_html(get_field('office_phone'));
                                    } else {
                                        echo '03-1234-5678';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="access-item">
                            <div class="access-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="access-content">
                                <h4 class="access-subtitle">メールアドレス</h4>
                                <p class="access-text">
                                    <?php
                                    if (function_exists('get_field') && get_field('office_email')) {
                                        echo esc_html(get_field('office_email'));
                                    } else {
                                        echo 'test@test.jp';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="access-directions">
                        <h4 class="access-subtitle">アクセス方法</h4>
                        <?php if (function_exists('get_field') && get_field('access_routes')): ?>
                            <div class="access-routes">
                                <?php echo wp_kses_post(get_field('access_routes')); ?>
                            </div>
                        <?php else: ?>
                            <ul class="access-routes">
                                <li>東京メトロ日比谷線「六本木駅」1C出口より徒歩3分</li>
                                <li>都営地下鉄大江戸線「六本木駅」3出口より徒歩6分</li>
                                <li>東京メトロ千代田線「乃木坂駅」5出口より徒歩10分</li>
                            </ul>
                        <?php endif; ?>
                        
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="access-contact-link">お問い合わせはこちら →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>