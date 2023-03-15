<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
   PARA CUSTOMIZAR LO QUE SE VE DESDE LA WEB, NO DESDE EL MAIL
 */
//print_r($node);
//exit;
//$node = $page['content']['system_main']['nodes'][0];

//campo field_noticias_destacadas_1
if(isset($node->field_noticia_destacadas_1['und'])) {
    $id_dest1=$node->field_noticia_destacadas_1['und'][0]['target_id'];
    $entity_dest1 = $node->field_noticia_destacadas_1['und'][0]['entity'];
//    print_r($entity_dest1);
    if(isset($entity_dest1->field_descripcion) and !empty($entity_dest1->field_descripcion['und'][0]['value'])) $desc_dest1 = $entity_dest1->field_descripcion['und'][0]['value'];
    elseif(isset($entity_dest1->field_descripcion_convocatoria) and !empty($entity_dest1->field_descripcion_convocatoria['und'][0]['value']))$desc_dest1 = $entity_dest1->field_descripcion_convocatoria['und'][0]['value'];
    elseif(isset($entity_dest1->field_descripcion_evento) and !empty($entity_dest1->field_descripcion_evento['und'][0]['value'])){
	    $desc_dest1 = $entity_dest1->field_descripcion_evento['und'][0]['value'];
    }else{ //no hay descripcion, tomo del body lo anterior a <more break>
	$body_value = $entity_dest1->body['und'][0]['value'];
	$pos = strpos($body_value, '<!--break-->');
	if ($pos === false)$desc_dest1 ='';
	else $desc_dest1 = substr($body_value,0,$pos);
    }
    $title_dest1 = $entity_dest1->title;
}else $id_dest1='';
//print_r($entity_dest1);
//echo "<br />";
if(isset($entity_dest1->field_imagen))$image_dest1=substr($entity_dest1->field_imagen['und'][0]['uri'],9);
elseif(isset($entity_dest1->field_imagen_convocatoria) and isset($entity_dest1->field_imagen_convocatoria['und'][0]['uri'])) {
    $image_dest1=substr($entity_dest1->field_imagen_convocatoria['und'][0]['uri'],9);
}elseif(isset($entity_dest1->field_imagen_evento) and isset($entity_dest1->field_imagen_evento['und'][0]['uri'])) {
    $image_dest1=substr($entity_dest1->field_imagen_evento['und'][0]['uri'],9);
}else $image_dest1='';

//campo field_noticia_destacadas_2_col1
if (isset($node->field_noticia_destacadas_2_col1['und'])){
//print_r($node->field_noticia_destacadas_2_col1['und'][0]['entity']);
    $id_dest2c1=$node->field_noticia_destacadas_2_col1['und'][0]['target_id'];
    $entity_dest2c1 = $node->field_noticia_destacadas_2_col1['und'][0]['entity']; 
    $title_dest2c1 = $entity_dest2c1->title;
    $desc_dest2c1='';
    //descripcion 
    //print_r($entity_dest2c1->field_descripcion);
    if(isset($entity_dest2c1->field_descripcion) and !empty($entity_dest2c1->field_descripcion['und'][0]['value'])) $desc_dest2c1 = $entity_dest2c1->field_descripcion['und'][0]['value'];
    elseif(isset($entity_dest2c1->field_descripcion_convocatoria) and !empty($entity_dest2c1->field_descripcion_convocatoria['und'][0]['value']))$desc_dest2c1 = $entity_dest2c1->field_descripcion_convocatoria['und'][0]['value'];
    elseif(isset($entity_dest2c1->field_descripcion_evento) and !empty($entity_dest2c1->field_descripcion_evento['und'][0]['value'])){
	    $desc_dest2c1 = $entity_dest2c1->field_descripcion_evento['und'][0]['value'];
    }else{ //no hay descripcion, tomo del body lo anterior a <more break>
	$body_value = $entity_dest2c1->body['und'][0]['value'];
	$pos = strpos($body_value, '<!--break-->');
	if ($pos === false)$desc_dest2c1 ='';
	else $desc_dest2c1 = substr($body_value,0,$pos);
    }
    
    if(isset($entity_dest2c1->field_imagen)){
	$image_dest2c1=substr($entity_dest2c1->field_imagen['und'][0]['uri'],9);
    }elseif(isset($entity_dest2c1->field_imagen_convocatoria) and isset($entity_dest2c1->field_imagen_convocatoria['und'][0]['uri'])){
	$image_dest2c1=substr($entity_dest2c1->field_imagen_convocatoria['und'][0]['uri'],9);
    }elseif(isset($entity_dest2c1->field_imagen_evento) and isset($entity_dest2c1->field_imagen_evento['und'][0]['uri'])){
	$image_dest2c1=substr($entity_dest2c1->field_imagen_evento['und'][0]['uri'],9);
    }else $image_dest2c1 = '';
}else $id_dest2c1='';

//campo field_noticia_destacadas_2_col2
if(isset($node->field_noticia_destacadas_2_col2['und'])){
    $id_dest2c2=$node->field_noticia_destacadas_2_col2['und'][0]['target_id'];
    $entity_dest2c2 = $node->field_noticia_destacadas_2_col2['und'][0]['entity'];
    $title_dest2c2 = $entity_dest2c2->title;
    if(isset($entity_dest2c2->field_imagen['und'][0]['uri'])){
    $image_dest2c2=substr($entity_dest2c2->field_imagen['und'][0]['uri'],9);
    }elseif(isset($entity_dest2c2->field_imagen_convocatoria) and isset($entity_dest2c2->field_imagen_convocatoria['und'][0]['uri'])){
	$image_dest2c2=substr($entity_dest2c2->field_imagen_convocatoria['und'][0]['uri'],9);
    }elseif(isset($entity_dest2c2->field_imagen_evento) and isset($entity_dest2c2->field_imagen_evento['und'][0]['uri'])){
	$image_dest2c2=substr($entity_dest2c2->field_imagen_evento['und'][0]['uri'],9);
    }else $image_dest2c2 = '';
}else $id_dest2c2='';
//campo field_noticia_destacadas_2_col3
if(isset($node->field_noticia_destacadas_2_col3['und'])){
    $id_dest2c3=$node->field_noticia_destacadas_2_col3['und'][0]['target_id'];
    $entity_dest2c3 = $node->field_noticia_destacadas_2_col3['und'][0]['entity'];
    $title_dest2c3 = $entity_dest2c3->title;
    if(isset($entity_dest2c3->field_imagen['und'][0]['uri'])){
	$image_dest2c3=substr($entity_dest2c3->field_imagen['und'][0]['uri'],9);
    }elseif(isset($entity_dest2c3->field_imagen_convocatoria) and isset($entity_dest2c3->field_imagen_convocatoria['und'][0]['uri'])){
	$image_dest2c3=substr($entity_dest2c3->field_imagen_convocatoria['und'][0]['uri'],9);
    }elseif(isset($entity_dest2c3->field_imagen_evento) and isset($entity_dest2c3->field_imagen_evento['und'][0]['uri'])){
	$image_dest2c3=substr($entity_dest2c3->field_imagen_evento['und'][0]['uri'],9);
    }else $image_dest2c3 = '';
}else $id_dest2c3='';
//campo field_noticia_destacadas_3
if (isset($node->field_noticia_destacadas_3['und'])){
$id_dest3=$node->field_noticia_destacadas_3['und'][0]['target_id'];
$entity_dest3 = $node->field_noticia_destacadas_3['und'][0]['entity'];
$title_dest3 = $entity_dest3->title;
}else {
    $id_dest3=0;
    $title_dest3 = '';
}
//$image_dest3=substr($entity_dest3->field_imagen['und'][0]['uri'],9);

if(isset($entity_dest3->field_imagen))$image_dest3=substr($entity_dest3->field_imagen['und'][0]['uri'],9);
elseif(isset($entity_dest3->field_imagen_convocatoria) and isset($entity_dest3->field_imagen_convocatoria['und'][0]['uri'])) {
    $image_dest3=substr($entity_dest3->field_imagen_convocatoria['und'][0]['uri'],9);
}elseif(isset($entity_dest3->field_imagen_evento) and isset($entity_dest3->field_imagen_evento['und'][0]['uri'])) {
    $image_dest3=substr($entity_dest3->field_imagen_evento['und'][0]['uri'],9);
}else $image_dest3='';

//echo $image_dest3;

//campo field_noticia_destacadas_4_col1
if (isset($node->field_noticia_destacadas_4_col1['und'])){
    $id_dest4c1=$node->field_noticia_destacadas_4_col1['und'][0]['target_id'];
    $entity_dest4c1 = $node->field_noticia_destacadas_4_col1['und'][0]['entity'];
    $title_dest4c1 = $entity_dest4c1->title;
        //descripcion 
    //print_r($entity_dest4c1->field_descripcion);
    if(isset($entity_dest4c1->field_descripcion) and !empty($entity_dest4c1->field_descripcion['und'][0]['value'])) $desc_dest4c1 = $entity_dest4c1->field_descripcion['und'][0]['value'];
    elseif(isset($entity_dest4c1->field_descripcion_convocatoria) and !empty($entity_dest4c1->field_descripcion_convocatoria['und'][0]['value']))$desc_dest4c1 = $entity_dest4c1->field_descripcion_convocatoria['und'][0]['value'];
    elseif(isset($entity_dest4c1->field_descripcion_evento) and !empty($entity_dest4c1->field_descripcion_evento['und'][0]['value'])){
	    $desc_dest4c1 = $entity_dest4c1->field_descripcion_evento['und'][0]['value'];
    }else{ //no hay descripcion, tomo del body lo anterior a <more break>
	$body_value = $entity_dest4c1->body['und'][0]['value'];
	$pos = strpos($body_value, '<!--break-->');
	if ($pos === false)$desc_dest4c1 ='';
	else $desc_dest4c1 = substr($body_value,0,$pos);
    }
//    print_r($entity_dest4c1->field_imagen_evento);
    //$image_dest4c1=substr($entity_dest4c1->field_imagen['und'][0]['uri'],9);
    if(isset($entity_dest4c1->field_imagen)){
	$image_dest4c1=substr($entity_dest4c1->field_imagen['und'][0]['uri'],9);
    }elseif(isset($entity_dest4c1->field_imagen_convocatoria) and isset($entity_dest4c1->field_imagen_convocatoria['und'][0]['uri'])){
	$image_dest4c1=substr($entity_dest4c1->field_imagen_convocatoria['und'][0]['uri'],9);
    }elseif(isset($entity_dest4c1->field_imagen_evento) and isset($entity_dest4c1->field_imagen_evento['und'][0]['uri'])){
	$image_dest4c1=substr($entity_dest4c1->field_imagen_evento['und'][0]['uri'],9);
    }else $image_dest4c1 = '';
}else $id_dest4c1='';
//echo "PASo $image_dest4c1";
//campo field_noticia_destacadas_4_col2
if(isset($node->field_noticia_destacadas_4_col2['und'])){
    $id_dest4c2=$node->field_noticia_destacadas_4_col2['und'][0]['target_id'];
    $entity_dest4c2 = $node->field_noticia_destacadas_4_col2['und'][0]['entity'];
    $title_dest4c2 = $entity_dest4c2->title;
    //$image_dest4c2=substr($entity_dest4c2->field_imagen['und'][0]['uri'],9);
    if(isset($entity_dest4c2->field_imagen)){
	$image_dest4c2=substr($entity_dest4c2->field_imagen['und'][0]['uri'],9);
    }elseif(isset($entity_dest4c2->field_imagen_convocatoria) and isset($entity_dest4c2->field_imagen_convocatoria['und'][0]['uri'])){
	$image_dest4c2=substr($entity_dest4c2->field_imagen_convocatoria['und'][0]['uri'],9);
    }elseif(isset($entity_dest4c2->field_imagen_evento) and isset($entity_dest4c2->field_imagen_evento['und'][0]['uri'])){
	$image_dest4c2=substr($entity_dest4c2->field_imagen_evento['und'][0]['uri'],9);
    }else $image_dest4c2 = '';
}else $id_dest4c2='';
//campo field_noticia_destacadas_4_col3
if(isset($node->field_noticia_destacadas_4_col3['und'])){
    $id_dest4c3=$node->field_noticia_destacadas_4_col3['und'][0]['target_id'];
    $entity_dest4c3 = $node->field_noticia_destacadas_4_col3['und'][0]['entity'];
    $title_dest4c3 = $entity_dest4c3->title;
    if(isset($entity_dest4c3->field_imagen)){
	$image_dest4c3=substr($entity_dest4c3->field_imagen['und'][0]['uri'],9);
    }elseif(isset($entity_dest4c3->field_imagen_convocatoria) and isset($entity_dest4c3->field_imagen_convocatoria['und'][0]['uri'])){
	$image_dest4c3=substr($entity_dest4c3->field_imagen_convocatoria['und'][0]['uri'],9);
    }elseif(isset($entity_dest4c3->field_imagen_evento) and isset($entity_dest4c3->field_imagen_evento['und'][0]['uri'])){
	$image_dest4c3=substr($entity_dest4c3->field_imagen_evento['und'][0]['uri'],9);
    }else $image_dest4c3 = '';
}else $id_dest4c3='';
//titulo seccion 1
if(isset($node->field_titulo_seccion_1['und'][0]['value'])){
    $titulo_seccion1 = $node->field_titulo_seccion_1['und'][0]['value'];
}else $titulo_seccion1='';
//titulo seccion 2
if(isset($node->field_titulo_seccion_2['und'][0]['value'])){
    $titulo_seccion2 = $node->field_titulo_seccion_2['und'][0]['value'];
}else $titulo_seccion2 ='';
//titulo seccion 3
if(isset($node->field_titulo_seccion_3['und'][0]['value'])){
    $titulo_seccion3 = $node->field_titulo_seccion_3['und'][0]['value'];
}else $titulo_seccion3 = '';
//titulo seccion 4
if(isset($node->field_titulo_seccion_4['und'][0]['value'])){
    $titulo_seccion4 = $node->field_titulo_seccion_4['und'][0]['value'];
}else $titulo_seccion4 = '';
//titulo seccion 4 libre
if(isset($node->field_titulo_seccion_4_0['und'][0]['value'])){
    $titulo_seccion4libre = $node->field_titulo_seccion_4_0['und'][0]['value'];
}else $titulo_seccion4libre = '';
//titulo seccion 5
if(isset($node->field_titulo_seccion_5['und'][0]['value'])){
    $titulo_seccion5 = $node->field_titulo_seccion_5['und'][0]['value'];
}else $titulo_seccion5 = '';
//array de noticias 5
if(isset($node->field_noticias_destacadas_5['und'])){
    $array_noticias_dest5 = $node->field_noticias_destacadas_5['und']; //foreach de esto
}else $array_noticias_dest5=array();
//titulo seccion 6
if(isset($node->field_titulo_seccion_6['und'][0]['value'])){
    $titulo_seccion6 = $node->field_titulo_seccion_6['und'][0]['value'];
}else $titulo_seccion6 = '';
//titulo seccion 7
if(isset($node->field_titulo_seccion_7['und'][0]['value'])){
    $titulo_seccion7 = $node->field_titulo_seccion_7['und'][0]['value'];
}else $titulo_seccion7 = '';

if (isset($node->field_seccion_4_libre['und'][0]['value'])) $body_seccion4libre = $node->field_seccion_4_libre['und'][0]['value'];
else $body_seccion4libre='';

//echo $body_seccion4libre;

if (isset($node->field_seccion_7['und'][0]['value'])) $body_seccion7 = $node->field_seccion_7['und'][0]['value'];
else $body_seccion7='';
//array de noticias 6
if(isset($node->field_noticias_destacadas_6['und'])){
$array_noticias_dest6 = $node->field_noticias_destacadas_6['und']; //foreach de esto
}else $array_noticias_dest6=array();

$header_image = substr($node->field_image_header['und'][0]['uri'],9);

//array agenda
if(isset($node->field_agenda['und'])){
 //print_r($node->field_agenda['und']);
 //echo "<br />";
 $array_agenda = $node->field_agenda['und']; //foreach de esto
 //armo array
 //fila 1
 if (isset($node->field_agenda['und'][0]))$array_agenda_fila1[0]= $node->field_agenda['und'][0];
 if (isset($node->field_agenda['und'][1]))$array_agenda_fila1[1]= $node->field_agenda['und'][1];
 if (isset($node->field_agenda['und'][2]))$array_agenda_fila1[2]= $node->field_agenda['und'][2];
 //fila 2
 if (isset($node->field_agenda['und'][3]))$array_agenda_fila2[0]= $node->field_agenda['und'][3];
 if (isset($node->field_agenda['und'][4]))$array_agenda_fila2[1]= $node->field_agenda['und'][4];
 if (isset($node->field_agenda['und'][5]))$array_agenda_fila2[2]= $node->field_agenda['und'][5];
}
//estilos

if(isset($node->field_color_boletin['und'][0]['value'])){
    $color = $node->field_color_boletin['und'][0]['value'];
}


if (!empty($color)){
    $color_texto = '#FFFFFF';
    $color_titulo = $color;
}else{
    $color_titulo = '#007398';
    $color = '#bbbbbb';
    $color_texto = '#333333';
}



?>

<table border="0" cellpadding="0" cellspacing="0" style="margin:auto; margin-top:0px; " width="589">
    <tbody>
        <tr>
        <td colspan="2" width="589">
        <div style="padding:8px; font-size:10px; font-family:Arial, Helvetica, sans-serif; color:#333333; text-align:right;">Si no puede visualizar correctamente, haga <a href="/node/<?php echo $node->vid; ?>" style="color:#333333; text-decoration:none;">clic aquí </a></div>
        </td>
    </tr>
        <tr>
            <td colspan="2" width="589"><!-- header -->
            <table border="0" cellpadding="0" cellspacing="0" width="589">
                <tbody>
                    <tr>
                        <td colspan="2">
                        <img style="max-width:589px" alt="" src="<?php echo '/sites/default/files/'.str_replace(" ","%20",$header_image); ?>" style="border:none; display:block;" />
                        </td>
                    </tr>
                    
               </tbody>
            </table>
            </td>
        </tr>
   <tr>
<?php 
if(!empty($node->body['und'][0]['value'])){
?>
    <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;"  width="589">
        <div style="background-color:#ffffff;">
            <div style="font-size:12px; line-height:17px; color:#3b3b3b; background-color:#FFFFFF;width:589px">
         <?php
         echo $node->body['und'][0]['value'];
         ?>
        </div>
        </div>
    </td>
    </tr>

<!-- seccion 1 -->
<?php 
}
if (!empty($titulo_seccion1)){ ?>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong><?php echo $titulo_seccion1 ?></strong></td>
</tr>


<?php
}
if(!empty($id_dest1)){
?> 
  <tr>
    <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;" width="589">
        <?php if(!empty($image_dest1)){ ?>
        <div style="padding-top:10px; padding-bottom:7px; font-size:18px; line-height:24px; width:589px;">
        <a href="<?php echo '/node/'.$id_dest1; ?>" target="_blank">
            <img alt="" src="<?php echo '/sites/default/files/'.str_replace(" ","%20",$image_dest1); ?>" style="padding-top:3px; display:block; width:589px; border:none;" />
        </a>
        </div>
        <?php } ?>
        <div style="padding-top:10px; padding-bottom:7px; font-size:18px; line-height:24px; width:589px;">
        <a href="/node/<?php echo $id_dest1; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>" target="_blank"><strong><?php echo $title_dest1; ?> </strong></a></div>
        <div style="background-color:#e2e2e2; padding-bottom:3px; width:589px;">
            <div style="font-size:12px; line-height:17px; color:#3b3b3b; padding-bottom:15px; background-color:#FFFFFF; width:589px;">
         <?php
         echo $desc_dest1
         ?>
        </div>
        </div>
    </td>
    </tr>
<?php
}
if(isset($array_agenda)){
?>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong>En agenda</strong></td>
</tr>
<tr>
	    <td colspan="2" width="589" style="padding-bottom: 20px;">
	    <table border="0" cellpadding="0" cellspacing="0" style="width:100%">
		<tbody>
		    <tr>
			<?php 
                        //print_r($array_agenda);
                        foreach($array_agenda_fila1 as $agenda){
			    $objeto = $agenda['entity'];
                            $fecha_inicio = $objeto->field_fecha_inicio['und'][0]['value'];
                            $dia = date('d',$fecha_inicio);
                            $mes = date('M',$fecha_inicio);
                            $titulo_evento = $objeto->title;
                            $url_evento = "/node/".$objeto->vid;
                        ?>
			<td style="padding-top:9px;font-family:Arial,Helvetica,sans-serif;font-size:12px; width:33px; color:#FFFFFF; height:80px;" valign="top">
			<div style="background-color:#c30d27; width:33px;">
			<div style="font-size:13px; font-weight:bold; padding:4px; padding-bottom:1px; text-align:center;"><?php echo $dia ?></div>

			<div style="font-size:9px; padding:5px; padding-top:1px; text-align:center;"><?php echo strtoupper($mes); ?></div>

			<div><img alt="" src="/sites/all/themes/uncboletin/images/date.png" style="display:block;" /></div>
			</div>
			</td>
                        <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;width:143px;" valign="top">
			<div style="line-height:16px;padding:9px;padding-left:5px;padding-top:8px"><a href="<?php echo $url_evento; ?>" style="text-decoration:none;color:#3b3b3b" target="_blank"><?php echo $titulo_evento; ?> </a></div>
			</td>
                        <?php 
                        }
                        ?>
		    </tr>
                   <?php if (isset($array_agenda_fila2)){ ?>
                   <tr>
			<?php 
                        foreach($array_agenda_fila2 as $agenda){
			    $objeto = $agenda['entity'];
                            $fecha_inicio = $objeto->field_fecha_inicio['und'][0]['value'];
                            $dia = date('d',$fecha_inicio);
                            $mes = date('M',$fecha_inicio);
                            $titulo_evento = $objeto->title;
                            $url_evento = "/node/".$objeto->vid;
                        ?>
			<td style="padding-top:9px;font-family:Arial,Helvetica,sans-serif;font-size:12px; width:33px; color:#FFFFFF; height:80px;" valign="top">
			<div style="background-color:#c30d27; width:33px;">
			<div style="font-size:13px; font-weight:bold; padding:4px; padding-bottom:1px; text-align:center;"><?php echo $dia ?></div>

			<div style="font-size:9px; padding:5px; padding-top:1px; text-align:center;"><?php echo strtoupper($mes); ?></div>

			<div><img alt="" src="/sites/all/themes/uncboletin/images/date.png" style="display:block;" /></div>
			</div>
			</td>
                        <td style="font-family:Arial,Helvetica,sans-serif;font-size:12px;width:143px;" valign="top">
			<div style="line-height:16px;padding:9px;padding-left:5px;padding-top:8px"><a href="<?php echo $url_evento; ?>" style="text-decoration:none;color:#3b3b3b" target="_blank"><?php echo $titulo_evento; ?> </a></div>
			</td>
                        <?php 
                        }
                        ?>
		    </tr>
                   <?php } ?>
		</tbody>
	    </table>
	    </td>
	</tr>

<?php
}
?>

<!-- seccion 2 -->
<?php 

if (!empty($titulo_seccion2)){ ?>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong><?php echo $titulo_seccion2 ?></strong></td>
</tr>

<?php
}
if (!empty($id_dest2c1) and !empty($id_dest2c2) and !empty($id_dest2c3) ){

?>
<!-- 3 columnas-->   
<tr>
    <td colspan="2"  width="589">
	    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		    <tr>
			<td width="190" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest2c1)) { ?>
                            <a href="/node/<?php echo $id_dest2c1; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest2c1); ?>" style="display:block; width:190px; padding-bottom:10px; border:none;" />
                            </a>
                            <?php } ?>
                            <a href="/node/<?php echo $id_dest2c1; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest2c1; ?>
                            </a>
                         </td>
                        <td width="190"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest2c2)) { ?>
                            <a href="/node/<?php echo $id_dest2c2; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest2c2); ?>" style="display:block; width:190px; padding-bottom:10px; border:none;" />
                            </a>
                             <?php } ?>
                            <a href="/node/<?php echo $id_dest2c2; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest2c2; ?>
                            </a>
                         </td>
                         <td width="190"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest2c3)) { ?>
                            <a href="/node/<?php echo $id_dest2c3; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest2c3); ?>" style="display:block; width:190px; padding-bottom:10px; border:none;" />
                            </a>
                             <?php } ?>
                            <a href="/node/<?php echo $id_dest2c3; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest2c3; ?>
                            </a>
                         </td>
		    </tr>
		</tbody>
	    </table>
	</td>
</tr>
<?php
}elseif (!empty($id_dest2c1) and !empty($id_dest2c2)){
?>
<!-- 2 columnas-->   
<tr>
    <td colspan="2"  width="589">
	    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		    <tr>
			<td width="290" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest2c1)) { ?>
                            <a href="/node/<?php echo $id_dest2c1; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest2c1); ?>" style="display:block; width:280px; padding-bottom:10px; border:none;" />
                            </a>
                            <?php } ?>
                            <a href="/node/<?php echo $id_dest2c1; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest2c1; ?>
                            </a>
                         </td>
                        <td width="290"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                           <?php if (!empty($image_dest2c2)) { ?>

                            <a href="/node/<?php echo $id_dest2c2; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest2c2); ?>" style="display:block; width:280px; padding-bottom:10px; border:none;" />
                            </a>
                             <?php } ?>
                            <a href="/node/<?php echo $id_dest2c2; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest2c2; ?>
                            </a>
                         </td>
		    </tr>
		</tbody>
	    </table>
	</td>
</tr>
<?php
}elseif (!empty($id_dest2c1)){
?>
<!-- 1 columna-->

  <tr>
    <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;" width="589">
        <?php if(!empty($image_dest2c1)){ ?>
        <div style="padding-top:10px; padding-bottom:7px; font-size:18px; line-height:24px; width:589px;">
        <a href="<?php echo '/node/'.$id_dest2c1; ?>" target="_blank">
            <img alt="" src="<?php echo '/sites/default/files/'.str_replace(" ","%20",$image_dest2c1); ?>" style="padding-top:3px; display:block; width:589px; border:none;" />
        </a>
        </div>
        <?php } ?>
        <div style="padding-top:10px; padding-bottom:7px; font-size:18px; line-height:24px; width:589px;">
        <a href="/node/<?php echo $id_dest2c1; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>" target="_blank"><strong><?php echo $title_dest2c1; ?> </strong></a></div>
        <div style="background-color:#e2e2e2; padding-bottom:3px; width:589px;">
            <div style="font-size:12px; line-height:17px; color:#3b3b3b; padding-bottom:15px; background-color:#FFFFFF; width:589px;">
         <?php
         echo $desc_dest2c1;
         ?>
        </div>
        </div>
    </td>
    </tr>


<!-- seccion 3 -->
<?php 
}
if (!empty($titulo_seccion3)){ ?>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong><?php echo $titulo_seccion3 ?></strong></td>
</tr>

<?php
}
if(!empty($id_dest3)){
?>
<tr>
    <td colspan="2"  width="589" style="font-family:Arial, Helvetica, sans-serif;">
        <?php if (!empty($image_dest3)) { ?>
        <div style="padding-top:10px; padding-bottom:7px; font-size:18px; line-height:24px; width:589px;">
        <a href="<?php echo '/node/'.$id_dest3; ?>" target="_blank">
            <img alt="" src="<?php echo '/sites/default/files/'.str_replace(" ","%20",$image_dest3); ?>" style="padding-top:3px; display:block; width:589px; border:none;" />
        </a>
        </div>
	<?php } ?>
        <div style="padding-top:10px; padding-bottom:7px; font-size:18px; line-height:24px; width:589px;">
        <a href="/node/<?php echo $id_dest3; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>" target="_blank"><strong><?php echo $title_dest3; ?> </strong></a></div>
        <div style="background-color:#e2e2e2; padding-bottom:3px; width:589px;">
            <div style="font-size:12px; line-height:17px; color:#3b3b3b; padding-bottom:15px; background-color:#FFFFFF; width:589px;">
         <?php
         if(isset($entity_dest3->field_descripcion['und'][0]['value']) and !empty($entity_dest3->field_descripcion['und'][0]['value'])) echo $entity_dest3->field_descripcion['und'][0]['value'];
         ?>
        </div>
        </div>
    </td>
    </tr>


<!-- seccion 4 -->
<?php 
}
if (!empty($titulo_seccion4)){ ?>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong><?php echo $titulo_seccion4 ?></strong></td>
</tr>

<?php
}

if (!empty($id_dest4c1) and !empty($id_dest4c2) and!empty($id_dest4c3) ){
?>
<!-- 3 columnas destacado 4-->   
<tr>
    <td colspan="2"  width="589">
	    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		    <tr>
			<td width="190"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest4c1)) { ?>
                            <a href="/node/<?php echo $id_dest4c1; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest4c1); ?>" style="display:block; width:190px; padding-bottom:10px; border:none;" />
                            </a>
                            <?php } ?>

                            <a href="/node/<?php echo $id_dest4c1; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest4c1; ?>
                            </a>
                         </td>
                        <td width="190"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest4c2)) { ?>
                            <a href="/node/<?php echo $id_dest4c2; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest4c2); ?>" style="display:block; width:190px; padding-bottom:10px; border:none;" />
                            </a>        
                             <?php } ?>

                            <a href="/node/<?php echo $id_dest4c2; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest4c2; ?>
                            </a>
                         </td>
                         <td width="190"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest4c3)) { ?>
                            <a href="/node/<?php echo $id_dest4c3; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest4c3); ?>" style="display:block; width:190px; padding-bottom:10px; border:none;" />
                            </a>
		            <?php } ?>
                            <a href="/node/<?php echo $id_dest4c3; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest4c3; ?>
                            </a>
                         </td>
		    </tr>
		</tbody>
	    </table>
	</td>
</tr>

<?php
}elseif (!empty($id_dest4c1) and !empty($id_dest4c2)){
?>
<!-- 2 columnas-->   
<tr>
    <td colspan="2"  width="589">
	    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		    <tr>
			<td width="290" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest4c1)) { ?>
                            <a href="/node/<?php echo $id_dest4c1; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest4c1); ?>" style="display:block; width:280px; padding-bottom:10px; border:none;" />
                            </a>
                            <?php } ?>
                            <a href="/node/<?php echo $id_dest4c1; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest4c1; ?>
                            </a>
                         </td>
                        <td width="290"  style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:190px;" valign="top">
                            <?php if (!empty($image_dest4c2)) { ?>
                            <a href="/node/<?php echo $id_dest4c2; ?>" target="_blank">
                                <img alt="" src="/sites/default/files/<?php echo str_replace(" ","%20",$image_dest4c2); ?>" style="display:block; width:280px; padding-bottom:10px; border:none;" />
                            </a>
                            <?php } ?>
                            <a href="/node/<?php echo $id_dest4c2; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>;" target="_blank"><?php echo $title_dest4c2; ?>
                            </a>
                         </td>
		    </tr>
		</tbody>
	    </table>
	</td>
</tr>
<?php
}elseif (!empty($id_dest4c1)){
?>
<!-- 1 columna-->

  <tr>
    <td colspan="2" style="font-family:Arial, Helvetica, sans-serif;" width="589">
        <?php if(!empty($image_dest4c1)){ ?>
        <div style="padding-top:10px; padding-bottom:7px; font-size:18px; line-height:24px; width:589px;">
        <a href="<?php echo '/node/'.$id_dest4c1; ?>" target="_blank">
            <img alt="" src="<?php echo '/sites/default/files/'.str_replace(" ","%20",$image_dest4c1); ?>" style="padding-top:3px; display:block; width:589px; border:none;" />
        </a>
        </div>
        <?php } ?>
        <div style="padding-top:10px; padding-bottom:7px; font-size:18px; line-height:24px; width:589px;">
        <a href="/node/<?php echo $id_dest4c1; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>" target="_blank"><strong><?php echo $title_dest4c1; ?> </strong></a></div>
        <div style="background-color:#e2e2e2; padding-bottom:3px; width:589px;">
            <div style="font-size:12px; line-height:17px; color:#3b3b3b; padding-bottom:15px; background-color:#FFFFFF; width:589px;">
         <?php
         echo $desc_dest4c1;
         ?>
        </div>
        </div>
    </td>
    </tr>

<!-- seccion 4 libre -->
<?php 
}
if (!empty($titulo_seccion4libre)){ ?>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong><?php echo $titulo_seccion4libre ?></strong></td>
</tr>
<?php 
}
if (!empty($body_seccion4libre)){ ?>
<tr><td colspan="2" width="589" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:589px;" valign="top">
<?php echo $body_seccion4libre; ?></td></tr>

<?php 
}
?>

<!-- seccion 5 -->
<?php 

if (!empty($titulo_seccion5)){ ?>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong><?php echo $titulo_seccion5 ?></strong></td>
</tr>


<?php  
}
if(isset($array_noticias_dest5)){
    foreach($array_noticias_dest5 as $dest5){
        //print_r($dest5);
        $objeto = $dest5['entity'];
        //$image_dest5=substr($objeto->field_imagen['und'][0]['uri'],9);
        if(isset($objeto->field_imagen)){
	    $image_dest5=substr($objeto->field_imagen['und'][0]['uri'],9);
	}elseif(isset($objeto->field_imagen_convocatoria) and isset($objeto->field_imagen_convocatoria['und'][0]['uri'])){
	    $image_dest5=substr($objeto->field_imagen_convocatoria['und'][0]['uri'],9);
	}elseif(isset($objeto->field_imagen_evento) and isset($objeto->field_imagen_evento['und'][0]['uri'])){
	    $image_dest5=substr($objeto->field_imagen_evento['und'][0]['uri'],9);
	}else $image_dest5 = '';

        if(!empty($image_dest5)){
            $img_dest5 = '<a href="/node/'.$objeto->vid.'" target="_blank"><img alt"" src="/sites/default/files/'.str_replace(" ","%20",$image_dest5).'" style="padding-right:9px; display:block; border:none;width:40%;float:left" /></a>';
        }else $img_dest5='';
//        echo "image dest5 $img_dest5<br />";
        ?>
         
        <tr>
	    <td colspan="2"  width="589" style="padding-top:15px; font-family: Arial, Helvetica, sans-serif;">
            <?php echo $img_dest5; ?>
            <div style="font-size:16px; line-height:22px; width:589px;">
                <a href="/node/<?php echo $objeto->vid; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>" target="_blank"><strong><?php echo $objeto->title; ?> </strong>
	        </a>
	    </div>
	    <div style="background-color:#e2e2e2; padding-bottom:2px; width:589px;">
		<div style="padding-top:9px; font-size:12px; color:#3b3b3b; line-height:18px; background-color:#FFFFFF; padding-bottom:15px; width:589px;">
		<?php
                   if(isset($objeto->field_descripcion['und'][0]['value'])) echo $objeto->field_descripcion['und'][0]['value'];
                   elseif(isset($objeto->field_descripcion_convocatoria['und'][0]['value'])) echo $objeto->field_descripcion_convocatoria['und'][0]['value'];
                   elseif(isset($objeto->field_descripcion_evento['und'][0]['value'])) echo $objeto->field_descripcion_evento['und'][0]['value'];
                   else{ //no hay descripcion, tomo del body lo anterior a <more break>
			$body_value = $objeto->body['und'][0]['value'];
			$pos = strpos($body_value, '<!--break-->');
			if ($pos === false)$desc_dest1 ='';
			echo substr($body_value,0,$pos);
		    }
                 ?>
                 <p>&nbsp;</p>
		</div>
	    </div>
	    </td>
	</tr>    

       
        <?php
       unset($objeto,$image_dest5);
    }
}
?>


<!-- seccion 6 -->
<?php if (!empty($titulo_seccion6)){ ?>
<tr><td colspan="2"><br></td></tr>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong><?php echo $titulo_seccion6 ?></strong></td>
</tr>
<?php  
}
if(isset($array_noticias_dest6)){
    foreach($array_noticias_dest6 as $dest6){
        $objeto = $dest6['entity'];
        //$image_dest6=substr($objeto->field_imagen['und'][0]['uri'],9);
        if(isset($objeto->field_imagen)){
	    $image_dest6=substr($objeto->field_imagen['und'][0]['uri'],9);
	}elseif(isset($objeto->field_imagen_convocatoria) and isset($objeto->field_imagen_convocatoria['und'][0]['uri'])){
	    $image_dest6=substr($objeto->field_imagen_convocatoria['und'][0]['uri'],9);
	}elseif(isset($objeto->field_imagen_evento) and isset($objeto->field_imagen_evento['und'][0]['uri'])){
	    $image_dest6=substr($objeto->field_imagen_evento['und'][0]['uri'],9);
	}else $image_dest6 = '';

        if(!empty($image_dest6)){
            $img_dest6 = '<a href="/node/'.$objeto->vid.'" target="_blank"><img alt"" src="/sites/default/files/'.str_replace(" ","%20",$image_dest6).'" style="padding-right:9px; display:block; width:589px; border:none; width:40%; float:left;" /></a>';
        }else $img_dest6='';
        ?>

	<tr>
	    <td colspan="2" style="padding-top:15px; font-family: Arial, Helvetica, sans-serif;">
            <?php echo $img_dest6; ?>
            <div style="font-size:16px; line-height:22px; width:589px;">
                <a href="/node/<?php echo $objeto->vid; ?>" style="text-decoration:none; color:<?php echo $color_titulo; ?>" target="_blank"><strong><?php echo $objeto->title; ?> </strong>
	        </a>
	    </div>
	    <div style="background-color:#e2e2e2; padding-bottom:2px; width:589px;">
		<div style="padding-top:9px; font-size:12px; color:#3b3b3b; line-height:18px; background-color:#FFFFFF; padding-bottom:15px; width:589px;">
		<?php
                   if(isset($objeto->field_descripcion['und'][0]['value'])) echo $objeto->field_descripcion['und'][0]['value'];
                   elseif(isset($objeto->field_descripcion_convocatoria['und'][0]['value'])) echo $objeto->field_descripcion_convocatoria['und'][0]['value'];
                   elseif(isset($objeto->field_descripcion_evento['und'][0]['value'])) echo $objeto->field_descripcion_evento['und'][0]['value'];
                   else{ //no hay descripcion, tomo del body lo anterior a <more break>
			$body_value = $objeto->body['und'][0]['value'];
			$pos = strpos($body_value, '<!--break-->');
			if ($pos === false)$desc_dest1 ='';
			echo substr($body_value,0,$pos);
		    }
                 ?>
                 <p>&nbsp;</p>
		</div>
	    </div>
	    </td>
	</tr>    

        <?php
       unset($objeto,$image_dest6);
    }
}


?>

<!-- seccion 7 -->
<?php if (!empty($titulo_seccion7)){ ?>
<tr><td colspan="2"><br></td></tr>
<tr>
    <td colspan="2"  width="589" style="background-color:<?php echo $color; ?>; color:<?php echo $color_texto; ?>; padding:5px;"><strong><?php echo $titulo_seccion7 ?></strong></td>
</tr>
<?php 
}
if (!empty($body_seccion7)){ ?>
<tr><td colspan="2" width="589" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:17px; padding-top:9px; padding-bottom:20px;padding-left: 3px; padding-right: 3px; width:589px;" valign="top">
<?php echo $body_seccion7; ?></td></tr>

<!--footer-->
<?php 
}
if (isset($node->field_image_footer['und'][0]['uri'])){?>
<tr>
    <td colspan="2"  width="589">
        <table border="0" cellpadding="0" cellspacing="0" width="589">
            <tbody>
                <tr>
                    <td colspan="2"  width="589">
                    <img alt="" src="<?php echo '/sites/default/files/'.str_replace(" ","%20",substr($node->field_image_footer['und'][0]['uri'],9)); ?>" style="border:none; display:block;width:589px;	" />
                    </td>
                </tr>
                
           </tbody>
        </table>
        </td>
</tr>
<?php } ?>
</tbody>
</table>
