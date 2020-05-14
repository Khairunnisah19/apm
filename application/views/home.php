<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blog Sederhana</title>
        <link rel="stylesheet" href="<?php echo base_url().'../../assets/bootstrap/css/bootstrap.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url().'../../assets/bootstrap/css/style.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url().'../../assets/font-awesome/css/font-awesome.css'; ?>" />
    </head>
    <body>

        
            <?php include("header.php"); ?>

        <nav class="navbar navbar-default"><?php include("menu.php"); ?></nav>

        <article>

            <div class="container wrap">
                <div class="row">
                    <div class="col-md-12">

                        <!-- ARTIKEL ------------------->
						<?php	if(count($artikel) > 0) {
						foreach ($artikel as $row){?>
                        <?php
                            // looping Artikel
                                echo "<div class='artikel-kop'>";
                                echo "<h2><b>".$row->judul."</b></h2>";
                                echo "<p class='artikel-tanggal'>Oleh <b>".$row->penulis."</b>, pada ".$row->tanggal."</p>";
                                echo "</div>";

                                echo "<div class='artikel-isi'>";
                                echo substr($row->isi, 0, 255);
                                echo " [<a href='".base_url()."detailartikel/".$row->id."' />Selengkapnya...</a>]";
                                echo "</div><hr/>";
                        ?>
							<?php }
						} ?>
                        <!-- END ARTIKEL --------------->
                    </div>
                </div>
            </div>

        </article>

        
        <?php include("footer.php"); ?>

    </body>
</html>
