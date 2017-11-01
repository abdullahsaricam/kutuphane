

<div id="wrapper" class="container sync60">
    <div id="header">
        <nav class="navbar navbar-default">
            <div class="container-fuild">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#responseMenu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Brand</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <?php if($_SESSION['rutbe']== 0 ) {?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kitap İşlemleri <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?do=kitaplar">Kitaplar</a></li>
                                    <li><a href="index.php?do=kitap-listele">Kitap Listesi</a></li>
                                    <li><a href="index.php?do=kitap-ekle">Kitap Ekle</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Üye İşlemleri <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?do=uye-listesi">Üye Listesi</a></li>
                                    <li><a href="index.php?do=uye-ekle">Üye Ekle</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori İşlemleri <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?do=kategori-listele">Kategori Listesi</a></li>
                                    <li><a href="index.php?do=kategori-ekle">Kategori Ekle</a></li>
                                </ul>
                            </li>

                        <?php } ?>

                        <?php if($_SESSION['rutbe'] == 1){ ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kitaplar <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?do=kitaplar">Kitap Listem</a></li>
                                </ul>
                            </li>
                        <?php  } ?>


                    </ul>
                    <div class="btn-group navbar-btn fRight">
                        <?php echo $_SESSION['username']; ?>
                        <a href="" data-toggle="modal" data-target="#sendMessage" class="btn btn-primary">Yönetici'ye Mesaj Gönder</a>
                        <a href="logout.php"   class="btn btn-danger">Çıkış</a>
                    </div>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

    <?php

    if(isset($_GET['do'])){

        switch ($_GET['do']) {

            case 'kategori-ekle':
                include 'view/category/kategori_ekle.php';
                break;

            case 'kategori_duzenle':
                include 'view/category/kategori_duzenle.php';
                break;

            case 'kategori-listele':
                include 'view/category/kategori_listesi.php';
                break;

            case 'kitap-ekle':
                include 'view/books/kitap_ekle.php';
                break;

            case 'kitap-listele':
                include 'view/books/kitap_listesi.php';
                break;

            case 'kitap-duzenle':
                include 'view/books/kitap_duzenle.php';
                break;

            case 'kitaplar':
                include 'view/books/kitaplar.php';
                break;
            case 'kitaplarim':
                include 'view/books/kitaplarim.php';
                break;

            case 'uye-ekle':
                include 'view/users/uye_ekle.php';
                break;

            case 'uye-duzenle':
                include 'view/users/uye_duzenle.php';
                break;

            case 'uye-listesi':
                include 'view/users/uye_listesi.php';
                break;

        }
    }else{

        ?>

        <div id="content">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">

                    <?php

                    $query_user =$db->from('users')
                        ->select('name_surname,user_id, count(user_id) ')
                        ->join('user_book','%s.user_id = %s.id')
                        ->join('books','%s.id = user_book.book_id')
                        ->groupby('name_surname,user_id')
                        ->run();

                    foreach ($query_user as $row ) {

                        echo $row['name_surname'].' '.$row['count(user_id)'].' => ';

                        $query_book = $db->from('user_book')
                            ->join('books', '%s.id = %s.book_id')
                            ->where('user_id',$row['user_id'])
                            ->run();

                        foreach ($query_book as $key ) {

                            echo $key['name'].' ';

                        }

                        echo '<br>';
                    }
                    ?>
                </div>

                <?php

                $uye = $db->from('users')
                    ->select('count(id) as total')
                    ->total();

                $kitap = $db->from('books')
                    ->select('count(id) as total')
                    ->total();

                $kategori = $db->from('category')
                    ->select('count(id) as total')
                    ->total();

                ?>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <ul class="list-group w3c">
                        <li class="list-group-item"><?php  echo $kitap; ?> <br> Kitap</li>
                        <li class="list-group-item"><?php echo $uye; ?> <br> Üye</li>
                        <li class="list-group-item"><?php echo $kategori;?> <br> Kategori</li>
                    </ul>
                </div>



            </div>
        </div>

        <?php

    }
    ?>

    <div id="footer">
        <div class="footer-box">
            
        </div>
    </div>
    <!-- end footer -->
</div>
<!-- modal box's -->

<!-- 1.login modal -->


<!-- 2.send message modal -->
<div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Yönetici'ye Mesaj Gönder</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post" data-toggle="validator">
                    <div class="form-group">
                        <label for="">Ad ve Soyad :</label>
                        <input type="text" name="" id="" class="form-control" required="" placeholder="ad ve soyad...">
                    </div>
                    <div class="form-group">
                        <label for="">Mesajınız :</label>
                        <textarea name="" id="" cols="30" rows="4" class="form-control" required="" placeholder="mesajınız..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Gönder</button>
                </form>
            </div>
        </div>
    </div>
</div>