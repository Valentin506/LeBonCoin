<title>Déposer une petite annonce sur leboncoin</title>
<link rel="stylesheet" type="text/css" href="{{asset('depositPost.css')}}"/>
<link href='https://fonts.googleapis.com/css?family=Nunito Sans' rel='stylesheet'>
<link rel="icon" type="image/x-icon" href="https://img.utdstc.com/icon/f01/c30/f01c30e1ae7730771565e60e5b26d888a6a6a49f2112235ba23d30abbc4b4923:200"> 

<script src="/js/deposit-post.js"></script>



<header>
    <nav class="headerNav">
        <div id="divImgLogo">
            <a href="{{url("/")}}"><img class="logo" src="https://www.leboncoin.fr/logos/leboncoin.svg"></a>
        </div>
        <div id="divDepositText">
            <span>Déposer une annonce</span>
        </div>
        <div id="divQuitButton">
            <a href="{{url("/")}}"><button>Quitter</button></a>
        </div>
    </nav>
</header>



@section('content')
<div>
    <div>
        <h3>Commeçons par l'essentiel !</h3>
        <label for="inputTitlePost">Quel est le titre de l'annonce ? *</label>
        <div id="divTitlePost">
            <input type="input" id="inputTitlePost" required></input>
            <button type="input" onclick="showCategoryDeposit()">Continuer</button>
        </div>
        <div id="divCategoryDeposit">
            <div id="divInputCatgory">
                <label for="checkboxCategory">Location de vacances</label></br>
                <input type="radio"  name="locavac" id="vacance"  value="H"/>
                        <label for="vacances">Locations de vacances</label></br>
                <input type="radio" name="locavac"  id="saisonnières" value="F"/>
                        <label for="saisonnières">Locations saisonnières</label>
                
            </div>
            

                

        </div>
        

    </div>
    <div>

    </div>
</div>

<div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>

</div>
<div>
    
</div>





