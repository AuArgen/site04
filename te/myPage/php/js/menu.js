document.querySelector(".fa-bars").onclick = () =>
{
    document.querySelector(".divBars").classList.toggle("active");
}
document.querySelector(".fa-sign-out").onclick = () =>
{
    let x = 2;
            $.ajax({
                url:'./session.php',
                type:'POST',
                cache:false,
                data:{x},
                dataType:'html',
                success: function (data) {
                  window.location.replace("./");
                }
            });
}