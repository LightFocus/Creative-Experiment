//读入过滤字json文件
var keyword=[
    {"name":"王"},
    {"name":"江泽民"},
    {"name":"周恩来"},
    {"name":"胡锦涛"},
    {"name":"刘少奇"},
    {"name":"李克强"},
    {"name":"吴"},
    {"name":"毛泽东"},
    {"name":"温家宝"},
    {"name":"习近平"},
];
var div = document.createElement("div");
if (/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)||/(Android)/i.test(navigator.userAgent)) {
    var warning=document.getElementById("gws-quantum-experimental_page_header__sbox").appendChild(div);
}else{
    var warning=document.getElementById("searchform").appendChild(div);
}
warning.style="text-align: center; background-color: rgb(68,68,68); border-radius:12px;border:1px solid rgb(68,68,68); width: 15ch;color:rgb(255,208,0)";
warning.setAttribute("class","A8SBwf fadeInDown" );
warning.style.display="none";
warning.innerText="非法关键字";


function fuck(){
document.getElementById("tsf").q.oninput = function (){
    console.log("oninput");
    var txt = document.getElementById("tsf").q.value;
    var error = 0;
    for(var i = 0; i <= keyword.length - 1; ++i){
        if(keyword[i].name == txt){
            error++; 
            console.log("error ++");
            break;
        }
    }
    if(error != 0){
        warning.style.display="block";
        warning.classList.add('animated', 'fadeInDown');
        document.getElementById("tsf").onsubmit=function(){return false;} 
    }
    else if( error == 0){
        warning.style.display="none";
        document.getElementById("tsf").onsubmit=function(){return true;} 
    }
}

}

window.onload=fuck();