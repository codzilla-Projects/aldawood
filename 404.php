<?php get_header(); ?>
<section class="error-section padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 xs-padding">
                <img src="<?= cl_URL ?>assets/img/404.webp" alt="404">
            </div>
            <div class="col-md-6 xs-padding text-right mt-5">
                <h1 class="text-right">عفوا! الصفحة غير موجودة!</h1>
                <p class="text-right">الصفحة التي تبحث عنها غير متوفرة أو تمت إزالتها. حاول الذهاب إلى الصفحة الرئيسية باستخدام الزر أدناه.</p>
                <a  href="<?php bloginfo('url'); ?>" class="default-btn">العودة إلى الصفحة الرئيسية<span></span></a>
            </div>
        </div>
    </div>
</section><!-- /.page-header -->
<?php get_footer(); ?>