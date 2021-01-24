
var deletePostBtn = document.getElementById('delete-post-btn');

if(  deletePostBtn ){

  deletePostBtn.addEventListener( 'click', function(e){

    if( confirm('Are you sure you want to delete this post?') ){
      return true;
    } else {
      e.preventDefault();
    }
  
  } );

}