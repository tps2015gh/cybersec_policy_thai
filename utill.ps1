
# Change file php  to html with PowerShell script   , 1 line  
foreach ($file in get-childitem *.php) { $fnm=$file.name.split(".")[0]; echo "$file.name  =>> $fnm.html" ; git mv $file.name "$fnm.html";  }


# Change file php  to html with PowerShell script   , multiple line   
foreach ($file in get-childitem *.php) { 
    $fnm=$file.name.split(".")[0]; echo "$file.name  =>> $fnm.html" ; 
    git mv $file.name "$fnm.html";   
}