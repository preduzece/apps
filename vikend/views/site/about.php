<?php
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'O nama';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

    <div class="blog-post-area">
        <h2 class="title text-center">Gde za vikend - o nama</h2>
        <div class="single-blog-post fixer">
            <a href="">
                <img src="<?= Url::base() ?>/img/newCover.jpg" class="img-responsive" alt="">
            </a>
            <h3>Gde za vikend u Beogradu, gde za vikend u Srbiji? </h3>
            <p>
                Najbolje ponude za vikend, najludji provod i najbolja ponuda za savršen vikend. Pronađi zabavu jer je 
                portal <b>www.gdezavikend.rs</b> je predviđen da okupi mlade i ponudi ideje kako da mladi upotpune svoje slobodno vreme 
                i uz našu pomoć isplaniraju savršen vikend. Naš cilj je da korisnicima omogućimo da budu uvek u toku 
                sa dešavanjima i da im na taj nacin pomognemo da nadju aktivnosti koje ih zanimaju. 
            </p> <br>
            <p>
                Na portalu se nalazi veliki broj popularnih i aktuelnih dešavanja vezanih  za porodični, zabavni i kulturni život, 
                informacije o zanimljivim mestima, društvenim i sportskim igrama, noćnim izlascima, uživanju u prirodi kao i neka zanimljiva putovanja.
            </p>
        </div>

        <div class="social-networks">
            <h2 class="title text-center">Društvene mreže</h2>
            <ul class="social-icons">
                <li><a href="https://www.facebook.com/gdezavikend1"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCPh-kvuQ4RijUYBQtQpzxBA"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://plus.google.com/u/0/b/101770396487292153275/101770396487292153275/about">
                    <i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div><!--/blog-post-area-->

</div>
