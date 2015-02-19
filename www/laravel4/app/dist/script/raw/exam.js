$(document).ready(function() {
    $('#submit-answer').on('click', function() {

        // JSON syntax
        // "answer":[
        //     {"id":"1", "answer":"A"},
        //     {"id":"2", "answer":"C"},
        //     {"id":"42",`"answer":"B"}
        // ]

        var $answer = [];

        $('.question').each(function() {
            var question_answer = {};
            var id = this.id;
            question_answer['id'] = id;
            question_answer['answer'] = $(this).find('[name='+id+'-ch]:checked').val();

            if(question_answer['answer']) {
                $answer.push(question_answer);
            }
        });
        console.log($answer);


        $.ajax({
            type: 'POST',
            url : '/user/exam/submit',
            data: {
                answer: $answer,
                tes: 'tes'
            },
            success: function() {
                alert('sukses')
            },
            error: function() {
                alert('Error POST data baru.');
            }
        });

        return false;
    });
})