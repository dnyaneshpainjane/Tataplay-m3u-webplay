
<?php
if (!isset($_POST['m3u_url'])) {
    // If the user hasn't submitted the form, display it
    ?>
    <html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
        <title>Dnyanesh | TataPlay</title>
    </head>
    <body>
        <div class="container" class="search">
            <form method="post">
                <label for="m3u_url">Enter m3u URL:</label>
                <input type="text" id="m3u_url" name="m3u_url">
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
    </html>
    <?php
} else {
    // If the user has submitted the form, process the URL and display the channels
    $url = $_POST['m3u_url'];
    include "channels.php";
}
?>


<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <title>Dnyanesh | TataPlay</title>
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPSNefEI0l3U47cxheilqsKlDMi2k7A7mYA&usqp=CAU" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="static/css/darkmode.min.css">
    <link rel="stylesheet" href="static/css/search.css">
    <script src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.1.5/lazysizes.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <style>
        .card {
            display: flex;
            justify-content: center;
            align-items: center;
            }
    </style>

</head>

<body>
    <div id="jtvh1">
        <h1>Dnyanesh TataPlay</h1>
    </div>

    <div class="container" class="search">
        <input id="search" type="text" placeholder="Search Your Channel">
        </div>

    <br>
    <div id="content">
        <div class="container">
            <div id="playlist" class="row">
                <script>
                    fetch("static/data/playlist.json")
                        .then(response => response.json())
                        .then(playlist => {
                            const playlistDiv = document.getElementById("playlist");

                            for (let i = 0; i < playlist.length; i++) {
                                const item = playlist[i];
                                const columnDiv = document.createElement("div");
                                columnDiv.classList.add("col-6", "col-sm-4", "col-md-3", "col-lg-2");

                                const cardLink = document.createElement("a");
                                cardLink.href = `play.php?videoUrl=${item.url}&licurl=${item.license_key}`;
                                cardLink.target = "_blank";

                                const cardDiv = document.createElement("div");
                                cardDiv.classList.add("card");

                                const logoImg = document.createElement("img");
                                logoImg.src = item.logo;
                                // logoImg.style.height = "150px";
                                logoImg.style.width = "70%";
                                logoImg.style.height = "70%";
                                cardDiv.appendChild(logoImg);

                                const infoDiv = document.createElement("div");
                                infoDiv.classList.add("info");

                                const nameSpan = document.createElement("span");
                                nameSpan.textContent = item.name;
                                infoDiv.appendChild(nameSpan);

                                cardDiv.appendChild(infoDiv);
                                cardLink.appendChild(cardDiv);
                                columnDiv.appendChild(cardLink);
                                playlistDiv.appendChild(columnDiv);
                            }

                            const searchInput = document.getElementById("search");
                            searchInput.addEventListener("input", () => {
                                const searchTerm = searchInput.value.toLowerCase();
                                const cards = playlistDiv.querySelectorAll(".card");
                                cards.forEach(card => {
                                    const name = card.querySelector(".info span").textContent.toLowerCase();
                                    if (name.includes(searchTerm)) {
                                        card.parentElement.parentElement.style.display = "block";
                                    } else {
                                        card.parentElement.parentElement.style.display = "none";
                                    }
                                });
                            });
                        })
                        .catch(error => console.error(error));
                </script>



            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var _0x432d9a=_0x2e0e;(function(_0x37dd6e,_0x2d7af9){var _0x3f5607=_0x2e0e,_0x207efa=_0x37dd6e();while(!![]){try{var _0x550a98=parseInt(_0x3f5607(0x83))/0x1+-parseInt(_0x3f5607(0x81))/0x2*(-parseInt(_0x3f5607(0x93))/0x3)+parseInt(_0x3f5607(0x82))/0x4*(-parseInt(_0x3f5607(0x86))/0x5)+-parseInt(_0x3f5607(0x91))/0x6*(-parseInt(_0x3f5607(0x90))/0x7)+-parseInt(_0x3f5607(0x92))/0x8*(-parseInt(_0x3f5607(0x89))/0x9)+-parseInt(_0x3f5607(0x8b))/0xa+-parseInt(_0x3f5607(0x7f))/0xb;if(_0x550a98===_0x2d7af9)break;else _0x207efa['push'](_0x207efa['shift']());}catch(_0x2be7bf){_0x207efa['push'](_0x207efa['shift']());}}}(_0x25ca,0xa6ad7),$(document)[_0x432d9a(0x84)](function(){var _0x4c944c=_0x432d9a;$('#search')['on'](_0x4c944c(0x8a),function(){var _0x106070=_0x4c944c,_0x56f35b=$(this)['val']()['toLowerCase']();$(_0x106070(0x87))['filter'](function(){var _0x2b7a98=_0x106070;$(this)['toggle']($(this)[_0x2b7a98(0x85)]()[_0x2b7a98(0x8e)]()[_0x2b7a98(0x8f)](_0x56f35b)>-0x1);});});}),$(document)[_0x432d9a(0x84)](function(){var _0x1b8ead=_0x432d9a;$(_0x1b8ead(0x8c))[_0x1b8ead(0x80)](function(){var _0x5854db=_0x1b8ead;$(_0x5854db(0x88))[_0x5854db(0x8d)]('fast');});}));function _0x2e0e(_0xea17b8,_0x46dee1){var _0x25ca89=_0x25ca();return _0x2e0e=function(_0x2e0e38,_0x37f777){_0x2e0e38=_0x2e0e38-0x7f;var _0x286de7=_0x25ca89[_0x2e0e38];return _0x286de7;},_0x2e0e(_0xea17b8,_0x46dee1);}function _0x25ca(){var _0x2cdea0=['#drop','72dIQIlx','keyup','8590350nclEDI','#menuimg','slideToggle','toLowerCase','indexOf','9185309BCJeFC','6ZRajvx','495408wMzDXK','315459UWauTb','3224947fswvLc','click','4AiZPiU','42064DPGLRf','1173586nYvaUJ','ready','text','645wHlWLs','.col-sm-4'];_0x25ca=function(){return _0x2cdea0;};return _0x25ca();}
    </script>

</body>

</html>