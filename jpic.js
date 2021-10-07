/*==================================*/
/*=== SITE: JAMESPANKHURST.CO.UK ===*/
/*======== Ver 4.0: 26.10.20 =======*/
/*==================================*/

/*-----USE $ TO REPRESENT getElementById()-----*/
function $(id){ return document.getElementById(id) };
/*----- GENERATE RANDOM INTEGER-------*/
function getRndInteger(min, max) { return Math.floor(Math.random() * (max - min + 1)) + min; };
/*----- sns SHOW / NO-SHOW ELEMENT--------*/      
function sns(x) { if (x.style.display === 'none'){ x.style.display = 'block';} else { x.style.display = 'none';	}}; 
/*----- DESTROY SESSION AND DATA-----*/
function destroy_session_and_data() { session-start(); $_SESSION = array(); if (session_id() != "" || isset($_COOKIE[session_name()])) setcookie(session_name(), '', time() - 2592000, '/'); session_destroy();};

function loadslider(xdiv, xpos, xfr) {
    var loadneed = $(xdiv);
	loadneed.style.display = "inline";
    var pos = 0;
    var id = setInterval(frame, xfr);
    function frame()
    {
    if (pos == xpos) { clearInterval(id); loadneed.style.display = "inline"; }  else {  pos++; loadneed.style.width = pos + "px"; } }
};
function logout(){
	//destroy_session_and_data();
	window.location.replace("index.html");
};


/*----- END -----*/  