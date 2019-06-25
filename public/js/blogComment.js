var textarea = document.getElementById('comment');

sceditor.create(textarea, {
    format: 'xhtml',
    icons: 'material',
    style: '{{ asset("js/sceditor/minified/themes/content/square.min.css") }}',
    toolbar: "bold,italic,underline,strike|left,center,right,justify|font,size,color,removeformat|cut,copy,pastetext|bulletlist,orderedlist|quote|horizontalrule,image,email,link,unlink|emoticon"
});

var writeComment = function(){
    
    $("#hParentsId").val("0");

    console.log($("#hParentsId"))
}