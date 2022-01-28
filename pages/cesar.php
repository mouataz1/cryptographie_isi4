<?php include '../includes/navbar.php' ?>

<?php
require '../calcules/calculCesar.php';
 
$key = 0;
$textToCrypt ;
$texToDecrypt;
$resdeck;
$resdeck ;

if(isset($_POST['encrypte'])){
    if(!empty($_POST['enckey']) && !empty($_POST['texttoenc']))
    {
        $enckey = $_POST['enckey'];
        $textToEnc = $_POST['texttoenc'];

        $res =  encrypt($textToEnc, $enckey);
    }
    
    
}else if(empty($_POST['enckey']) && empty($_POST['texttoenc']))
{
    $res = "";
    $_POST['enckey'] = 0;
    $_POST['texttoenc'] = "";

}else{
    echo '<div class="alert alert-danger" role="alert">
    la clé et le message ne doit pas etre vide !
  </div>';
}

if(isset($_POST['decrypte']))
{
    if(isset($_POST['deckey']) && isset($_POST['texttodec'])){
       $deckey = $_POST['deckey'];
    $textTodeck = $_POST['texttodec'];
    $resdeck = decrypt($textTodeck, $deckey); 
    }else if(empty($_POST['deckey']) && empty($_POST['texttodec']))
    {
        $resdeck = "";
        $_POST['deckey'] = 0;
        $_POST['texttodec'] = "";
    
    }else{
        echo '<div class="alert alert-danger" role="alert">
        la clé et le message ne doit pas etre vide !
      </div>';
    }
    
}



?>

<div class="container">
    <h1 class="text-center text-bold mt-4">Substitution par translation ou substitution de César </h1>
    <h4 class="mt-2 mb-2 alert alert-dark">chifrement</h4>
    <div class=" row m-4 p-4">
        <div class="col-md-5">
            <form action="" method="post">
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">la clé de chiffrement</label>
                    <input type="number" name="enckey" class="form-control shadow-sm bg-body rounded" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  echo $_POST['enckey'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Text a Crypter </label>
                    <textarea name="texttoenc" id="" cols="30" rows="5" class="form-control shadow-sm bg-body rounded" id="exampleInputPassword1" value="<?php echo $_POST['texttoenc']; ?>" required></textarea>
                </div>
                <div class="d-grid gap-2 shadow-sm bg-body rounded">
                    <button type="submit" name="encrypte" class="btn btn-primary">Crypter</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="mb-3">
                <h5 class="text-center"> Resultat de chifrement</h5>
            </div>
            <div class="mb-3 border border-warning shadow-sm bg-body rounded" style="height: 30vh;">
            <p class=" p-2">
                <?php echo $res; ?>
            </p>

            </div>

        </div>
        
    </div>


    <h4 class="mt-2 mb-2 alert alert-dark">déchifrement</h4>
    <div class=" row m-4 p-4">
        <div class="col-md-5">
            <form action="" method="post">
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">la clé de déchiffrement</label>
                    <input type="number" name="deckey" class="form-control shadow-sm bg-body rounded" id="deckey" aria-describedby="emailHelp" value="<?php echo $_POST['deckey'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Text a deCrypter </label>
                    <textarea name="texttodec" id="" cols="30" rows="5" class="form-control shadow-sm bg-body rounded" id="decktext" value="<?php echo $_POST['texttodec']; ?>" required></textarea>
                </div>
                <div class="d-grid gap-2 shadow-sm bg-body rounded">
                    <button type="submit" name="decrypte" class="btn btn-primary">deCrypter</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <div class="mb-3">
                <h5 class="text-center"> Resultat de déchifrement</h5>
            </div>
            <div class="mb-3 border border-warning shadow-sm bg-body rounded" style="height: 30vh;">
            <p class=" p-2">
                <?php echo $resdeck; ?>
            </p>

            </div>

        </div>
        
    </div>
    
</div>


<?php include '../includes/footer.php'; ?>