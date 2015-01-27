function Query(searchTerm) {
    
    var promise = $.ajax({
        url: 'search.php',
        type: 'get',
        dataType: 'json',
        data: { dvdTitle: searchTerm }
    });
    
    console.log(promise);
    return promise;
    
}
/*
$('form').on('submit', function(e) {
           
  e.preventDefault(); 
  var searchTerm = $('#search-box').val();
  console.log(searchTerm);
  var query = Query(searchTerm);
  
  query.done(function(data) {
    
      console.log(data);
    
    $('#search-box').val("");
    
    
    for(var i = 0; i < data.response.songs.length; i++)
    {
        
        songList.addSong(songTemplateFunction(data.response.songs[i]));
        
      
    }
    
    $('#songResults').css('color', 'black'); 
    songList.render();
    
    
    // render data on page using client side templating
    });
    
  
});
*/