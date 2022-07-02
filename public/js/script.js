$(function () {
  let vote = $('.voteButton');
  vote.on('click', function(){
    let $this = $(this);
    let $PostId = $this.data('post-id');
    let $rank = $this.data('rank');
    
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/vote',
      method: 'POST',
      data: {
        'post_id': $PostId,
        'rank': $rank,
      },
    })
    .done(function (data){
      $('.votes_count').text(data.votes_count);
      if (vote.hasClass('btn-secondary')){
        vote.removeClass('btn-secondary');
        vote.addClass('btn-primary');
      } else {
        vote.removeClass('btn-primary');
        vote.addClass('btn-secondary');
      }
      console.log(data.votes_count);
      console.log('succeeded');
    })
    .fail(function(){
      console.log('fail');
    })
  })
})