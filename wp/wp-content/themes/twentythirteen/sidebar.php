<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div id="tertiary" class="sidebar-container" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area">
                <nav id="sidebar-menu">
                    <ul>
                        <li id="zones">
                            <a href="<?php get_site_url(); ?>/zone-dintervention/">
                            <div class="menu-label">zone d'intervention</div>
                            <div class="picto"><img src="<?php bloginfo('template_url'); ?>/images/sonutri/zones.png" /></div>
                            </a>
                        </li>
                        <li id="therapeutique">
                            <a href="<?php get_site_url(); ?>/dietetique-therapeutique/">
                            <div class="menu-label">diététique thérapeutique</div>
                            <div class="picto"><img src="<?php bloginfo('template_url'); ?>/images/sonutri/therapeutique.png" /></div>
                            </a>
                        </li>
                        <li id="idees">
                            <a href="<?php get_site_url(); ?>/category/idees-recettes/">
                            <div class="menu-label">idées recettes</div>
                            <div class="picto"><img src="<?php bloginfo('template_url'); ?>/images/sonutri/idees.png" /></div>
                            </a>
                        </li>
                        <li id="semainier">
                            <a href="<?php get_site_url(); ?>/semainier/">
                            <div class="menu-label">semainier</div>
                            <div class="picto"><img src="<?php bloginfo('template_url'); ?>/images/sonutri/semainier.png" /></div>
                            </a>
                        </li>
                        <li id="temoignages">
                            <a href="<?php get_site_url(); ?>/temoignages-patients/">
                            <div class="menu-label">témoignages patients</div>
                            <div class="picto"><img src="<?php bloginfo('template_url'); ?>/images/sonutri/temoignages.png" /></div>
                            </a>
                        </li>
                    </ul>
                </nav>
                <section id="portrait">
                    <a href="<?php get_site_url(); ?>/qui-suis-je/">
                    <h2>Sophie Paulin</h2>
                    <h3>Diététicienne nutritionniste</h3>
                    <img src="<?php bloginfo('template_url'); ?>/images/sonutri/soso-<?php echo rand(0, 3); ?>.jpg"/>
                    </a>
                </section>
                <section id="imc" style="min-height: 235px;">
                    <h2>Je calcule mon IMC</h2>
                    <img src="<?php bloginfo('template_url'); ?>/images/sonutri/imc.png">
                    <div style="float: left;width: 140px;padding: 0 10px;">
                        <input id="poids" type="text" placeholder="Poids(kg)">
                        <input id="taille" type="text" placeholder="Taille(m). ex : 1.80 ">
                        <button type="submit" >Calculer mon IMC</button>
                        <script type="application/javascript">
                            $(document).ready(function(){
                                $('#imc button').on('click', function() {
                                    var size = $('#taille').val();
                                    size = size.replace(',', '.');
                                    size = parseFloat(size);
                                    var weight = $('#poids').val();
                                    weight = weight.replace(',', '.');
                                    weight = parseFloat(weight);

                                    var imc = Math.round(weight / (size * size));

                                    var text = '';
                                    if (imc < 16.5) {
                                        text = "Votre IMC est de "+imc+"  , vous état en étant de dénutrition. Veuillez consultez un médecin en urgence.";
                                    } else if (imc <= 18.9) {
                                        text = "Votre l'IMC est de "+imc+" , vous êtes en état de maigreur. N'hésitez pas à prendre rendez-vous avec votre diététicienne pour une reprise de poids et une santé à toute épreuve !";
                                    } else if (imc <= 24.9) {
                                        text = "Votre IMC est de "+imc+", vous êtes de corpulence normale. Félicitations et gardez le cap !";
                                    } else if (imc <= 29.9) {
                                        text = "Votre IMC est de "+imc+", vous êtes en surpoids. N'hésitez pas demander conseil auprès de votre diététicienne pour retrouver votre poids d'équilibre.";
                                    } else if (imc <= 34.9) {
                                        text = "Votre IMC est de "+imc+", vous êtes en situation d'obésité modérée. N'hésitez pas à prendre rendez-vous avec votre diététicienne pour préserver votre santé.";
                                    } else if (imc <= 39.9) {
                                        text = "Votre IMC est de "+imc+", vous êtes en situation d'obésité sévère. Prenez rapidement rendez-vous avec votre diététicienne pour perdre du poids et préserver votre santé.";
                                    } else if (imc > 39.9) {
                                        text = "Votre IMC est de "+imc+", vous êtes en situation d'obésité très sévère dite \"morbide\" avec des risques pour la santé important. Prenez rende-vous au plus vite avec votre diététicienne.";
                                    }

                                    $('#imc-result').html(text);
                                });
                            });
                        </script>
                        <div style="clear:both;"></div>
                    </div>
                    <div id="imc-result" style="padding:10px;float:left"></div>

                </section>
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
	</div><!-- #tertiary -->
<?php endif; ?>
