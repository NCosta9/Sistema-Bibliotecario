//animação da caixa de notificaçao onde com um click no icone abre a caixa e qando se click fora em qualquer lugar do display fecha 

$(document).ready(function()
{
$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
return false;
});

//Document Click
$(document).click(function()
{
$("#notificationContainer").hide();
$("#notification_count").fadeIn("slow");

});
//Popup Click
$("#notificationContainer").click(function()
{
return false
});

});
