var splashPrompt = '';



var splashArray = [
    "                __                             ___            _yygL\n" +
    "               #####gy_,                    y#######g   __g########g \n" +
    "              g#F   `M##bg.                g#\"'    ###g####~'    9##L \n" +
    "             ##F       `###g____yyyyy_____j#\"        ###          ##E \n" +
    "            a#F           3##\"#~~~~~~~#####\"          ##g          ## \n" +
    "           j#F                           5#      ____ _##y__       ##1 \n" +
    "           a#                           y##    _g##~####\"#M##g     ##1 \n" +
    "           #E                           J#L    ##  g#\"'     `#########g_ \n" +
    "          o#1                           ##     ## y#E         ##L     9#, \n" +
    "           #g                           ##      ####F         3#g      ## \n" +
    "          a#F                           3#L       ##L         ##M#.    ##! \n" +
    "         g#F                             ##_     _##g       _g#F #g   y## \n" +
    "        _#F                               ~###g###~M##g_   y###yg#'  y##' \n" +
    "        ##                                           `?\"M###        g##F \n" +
    "       ##'                                                ?#,      ###L \n" +
    "       #E                                                  ##g___g#\"### \n" +
    "      J#F                                                    `M##'   ##L \n" +
    "      ##                                                              ## \n" +
    "      ##                                                              ## \n" +
    "      ##                                                              ##L \n" +
    "   ___##y_.      a#o                                                __##1 \n" +
    "##\"\"F~5#F        ###L                                 __          #M#M###M## \n" +
    "      J#K        ###L                                g##g             ## \n" +
    "     _y##ga       ~           _amog                  ####            ##F \n" +
    " a###~'\"#1                   d#   \"#                 \"##          #wy##L. \n" +
    "        3#,                   #g__g\"                                ##\"\"5##g \n" +
    "         ##g#                    ''                                a##    '~ \n" +
    "    __y#\"FH#_                                                  y_ g## \n" +
    "   ##\"'     ##g                                                 \"###g_ \n" +
    "   ~         `9#g_                                            _g##'\"9##gg, \n" +
    "                 ?##gy_.                                   _y##\"'      `## \n" +
    "                     ~\"####ggy_____                  ___g###F' \n" +
    "                             \"~~~~~##################~~~\"\" \n" +
    "\n" +
    "                    [[gu;pink;black]WELCOME TO THE BRIGHT SIDE]\n" +
    "          Connecting co workers which share common interests\n" +
    "                    Happy Tree Friends (C) 2015\n" +
    "\n",
    
    " \n" +
    " \n" +
    "           _.-'   ```'--.._\n" +
    "         .'                `-._\n" +
    "        /                      `.\n" +
    "       /                         `.\n" +
    "      /                            `.\n" +
    "     :       (                       \n" +
    "     |    (   \\_                  )   `.\n" +
    "     |     \\__/ '.               /  )  ;\n" +
    "     |   (___:    \\            _/__/   ;\n" +
    "     :       | _  ;          .'   |__) :\n" +
    "      :      |` \\ |         /     /   /\n" +
    "       \\     |_  ;|        /`\\   /   /\n" +
    "        \\    ; ) :|       ;_  ; /   /\n" +
    "         \\_  .-''-.       | ) :/   /\n" +
    "        .-         `      .--.'   /\n" +
    "       :         _.----._     `  <\n" +
    "       :       -'........'-       `.\n" +
    "        `.        `''''`           ;\n" +
    "          `'-.__                  ,'\n" +
    "                ``--.   :'-------'\n" +
    "                jgs :   :\n" +
    "\n" +
    "           [[gu;aquamarine;black]I Tawt I Taw a Puddy Tat!]\n" +
    "                    \n" +
    "                    \n" +
    " Connecting co workers which share common interests\n" +
    "           Happy Tree Friends (C) 2015\n" +
    "\n",
    
    
    " §§§§§§¶¶¶¶¶¶§§§§§§§§§§§¶§¶§¶¶¶¶¶¶¶§§§¶§§ \n"+
    " §§§¶§§111111§§1§¶§§§§§§¶§11§§111111§1¶§§\n"+
    " §§§¶¶§§11111§§1§¶§§§§§¶¶1§§§§11111§§§¶§§\n"+
    " §§§§¶¶§§1111§§1§¶§§§§§¶¶1§§¶11111§§§¶§§§\n"+
    " §§§§§¶¶§§111§§§1¶§§§§§¶§1§§§1111§§§¶§§§§\n"+
    " §§§§§§¶§1§§11¶§§¶¶§§§§¶§1§§§11§§§¶¶§§§§§\n"+
    " §§§§§§§¶¶1§§1§§1¶¶§§§§¶§11§11§§§¶¶§§§§§§\n"+
    " §§§§§§§§¶¶1§§¶§1¶¶§§¶¶¶§1§§§§§§¶¶§§§§§§§\n"+
    " §§§§§§§§§¶¶1§§§1¶¶¶¶¶§¶¶¶§§§1§¶§§§§§§§§§\n"+
    " §§§§§§§§§§¶¶§§§1¶¶§¶§¶¶¶§¶§§§¶§§§§§§§§§§\n"+
    " §§§§§§§§§§§¶¶§§1§§11§¶§§¶§§§¶¶§§§§§§§§§§\n"+
    " §§§§§§§§§§¶§§§§§§§§§§1§§§§§§§§¶§§§§§§§§§\n"+
    " §§§§§§§§§¶¶1§§§§§§§§§§§§§§§§§1§¶§§§§§§§§\n"+
    " §§§§§§§§§¶§§§1§§§§§§§§§§§§§11§§¶§§§§§§§§\n"+
    " §§§§§§§§§¶§§111§§§§§§§§§§§111§§¶¶§§§§§§§\n"+
    " §§§§§§§§¶§§§1111§§§§§§§§§11111§§¶§§§§§§§\n"+
    " §§§§§§§¶§1§§1111§§§§§§§§§11111§1§¶§§§§§§\n"+
    " §§§§§§¶¶1§§§11111§§§§§§§11111§§§1¶¶§§§§§\n"+
    " §§§§¶¶§1§§§§11111§§§§§§§11111§§§§1¶¶§§§§\n"+
    " ¶¶¶§¶¶§§§§§¶11§¶1§§§§§§§1¶¶11¶§§§§§¶¶¶¶¶\n"+
    " ¶§§111111§§§¶1¶¶§§§§§§§§§¶¶1§§§§1111§§§§\n"+
    " 1111111§111111§¶§§§§§§§§§¶§1111111111111\n"+
    " §§§§§§§1§§§§§1111§§§§§§§11111111§1§1§§§1\n"+
    " 111111§§§¶¶¶¶¶¶¶¶§1§§§11¶¶¶¶¶¶¶¶§§§§1§11\n"+
    " 11§§§§§§§1§¶¶¶¶¶¶111¶§11¶¶¶¶¶¶¶111111111\n"+
    " §1111111111§¶¶§¶¶111§111§¶§§¶¶1111111111\n"+
    " ¶§1111111111§¶¶¶¶111§111¶¶¶¶¶1111111111§\n"+
    " ¶¶¶§111111111§¶¶¶§111111¶¶¶¶111111111§¶¶\n"+
    " §§¶¶¶§11111111§¶¶¶§§11§¶¶¶¶§11111111¶¶¶§\n"+
    " §§§§¶¶¶§1111111§¶¶¶¶¶¶¶¶§¶§111111§¶¶¶§§§\n"+
    " §§§§§§¶¶¶¶§§1111§¶§§§§§§§11111§§¶¶¶§§§§§\n"+
    " §§§§§§§§§¶¶¶¶¶§§11§§§§§§1§§§¶¶¶¶§§§§§§§§\n"+
    " §§§§§§§§§§§§§§¶§§§111111¶¶§¶¶§§§§§§§§§§§\n"+
    "\n" +
    "              [[gu;aquamarine;black]What's up doc!]\n" +
    "                    \n" +
    "                    \n" +
    " Connecting co workers which share common interests\n" +
    "           Happy Tree Friends (C) 2015\n" +
    "\n",
    
    
    
    
  "  :::,\n"+
  "  '::::'._\n"+
  "    '.    '.                        __.,,.\n"+
  "     '.    '.                _..-'''':::\n"+
  "        \\     \\,.--\"\"\"\"--.,-''      _:'\n"+
  "    /\\   \\  .               .    .-'\n"+
  "   /  \\   \\                   ':'\n"+
  "  /    \\  :                     :\n"+
  " /      \\:                       :\n"+
  " \\       :                       :\n"+
  "  \\      :      ,--,         ,-,  :\n"+
  "   \\    :      |(_):|       |():| :\n"+
  "    \\   :     __'--'   __    '-'_  :\n"+
  "     \\  :    /  \\      \\/      / \\ :\n"+
  "      \\  :  (    )             \\_/ :\n"+
  "   .-'' . :  \\__/   '--''--'      :\n"+
  "   \\  . .-:'.                   .:\n"+
  "    \\' :| :  '-.__      ___...-' :\n"+
  "     \\::|:        ''''''          '.\n"+
  "   .,:::':  :                       '.\n"+
  "    \\::\\:   :                         '._\n"+
  "     \\::    :     /             '-._     '.\n"+
  "      \\:    :    /              .   :-._ :-'\n"+
  "       :    :   /               :   :  ''\n"+
  "       :   .'   )'.             :   :\n"+
  "        :  :  .'   '.          :   :\n"+
  "         : '..'      :      _.' _.:\n"+
  "          '._        :..---'\\'''  _)\n"+
  "             '':---''_)      '-'-'\n"+
  "                '-'-'         !\n"+
  "\n" +
  "              [[gu;aquamarine;black]PIKACHU! PIKACHU!]\n" +
  "                    \n" +
  "                    \n" +
  " Connecting co workers which share common interests\n" +
  "           Happy Tree Friends (C) 2015\n" +
  "\n",
  
  
  
"                 .'\n"+
"            .-' |     .'\n"+
"        .-''    /._.-' |\n"+
"      .'    `..'  .    /\n"+
"     /             `..'\\\n"+
"    |        /'.   .'\\  \\\n"+
"  /`..._     | O\\|/ O|  |\n"+
"  | .   `.  .    '.  '  |\n"+
"  \\ '. :    \\\\   -' .  /\n"+
"   `._ _.    \\`----' .'\n"+
"      _.`   . `-' .-`._\n"+
"   .-'       `---'     `-.\n"+
"  /   `._.          ._.   \\\n"+
" |      `-.       .-`     /\n"+
"  `-...._`.)-----(.'_...-'\n"+
"         '.)     (.' |\n"+
"          |--.._     /\n"+
" /.-._.::.|     '._.'\\\n"+
" \\.-._.:.` \\      \\   `.\n"+
"          _.`     |     `/`.\n"+
"       .-'       /.     ' - |\n"+
"      /      __.'  `.     .'\n"+
"      `.._    -`.   |    /\n"+
"          `--.__.'  `---'\"\n"+
"\n"+
"              [[gu;aquamarine;black]Evil me!]\n" +
"                    \n" +
"                    \n" +
" Connecting co workers which share common interests\n" +
"           Happy Tree Friends (C) 2015\n" +
"\n",
    
];
splashPrompt = splashArray[Math.floor(Math.random()*splashArray.length)];
