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
        {"name":""}
        ];
        
        function kwfilter() {
            var content = document.getElementById("google_content");
            for (var i = 0; i < keyword.length; ++i) {
                var reg = new RegExp(keyword[i].name, "g");
                var replace_content = "";
                for (var j = 0; j < keyword[i].name.length; ++j) {
                    replace_content += " ";
                }
                content.innerHTML = content.innerHTML.replace(reg, replace_content);
            }
        }

        kwfilter();