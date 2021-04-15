<?php get_header(); ?>

<!-- main -->
    <main class="main cntInner inner">
        <div class="no-page">
            <p>ページが存在しません。</p>
            <a href="<?php echo home_url(); ?>">TOPへ戻る</a>
        </div>
    </main>
    <style>
        .no-page {
            margin: 200px 0;
        }
        .no-page p {
            font-size: 16px;
            margin-bottom: 16px;       
        }
        .no-page a {
            font-size: 14px;
            border-bottom: 1px solid;            
        }
    </style>
<?php get_footer(); ?>

</body>
</html>