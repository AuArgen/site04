if ( document.querySelector(".circlejs")) document.querySelector(".circlejs").onclick = ()=> {
		document.querySelector(".nav").classList.toggle("navActive")
	}

document.querySelector(".kurstar").onclick = ()=> {
		document.querySelector(".ulKurstar").classList.toggle("ulActive")
	}
 document.querySelector(".fa-bars").onclick = () =>
{
    document.querySelector(".divBars").classList.toggle("active");
    alert()
    if (document.querySelector(".navActive")) document.querySelector(".nav").classList.toggle("navActive")
    if (document.querySelector(".ulActive")) document.querySelector(".ulKurstar").classList.toggle("ulActive")
}
if (document.querySelector(".fa-sign-out")) document.querySelector(".fa-sign-out").onclick = () =>
{
    let x = 1;
            $.ajax({
                url:'./myPage/php/session.php',
                type:'POST',
                cache:false,
                data:{x},
                dataType:'html',
                success: function (data) {
                  window.location.replace("./");
                }
            });
}
    window.onkeydown = ()=> {
        return false;
    }
    document.querySelector("body").oncontextmenu = () => {
        return false;
    }