$(document).ready(function() {

    // Prevent premature submission
    $(window).keydown(function(event) {
        return (event.keyCode == 13)? false : true;
    });

    var subject = $('form').attr('id').replace('-paper', '');

    // Backup answer, accident prevention
    $('.choice-radio').click(function (ev) {
        var qid = $(this).attr('name').split('-')[0];
        var val = $(this).attr('value');
        localStorage.setItem(subject + '-' + qid, val);
    });

    function loadChoices() {
        var quests = $("div.row.question").get();  // Get questions count
        for(var i = 0; i < quests.length; i++) {
            var value = localStorage.getItem(subject + '-' + quests[i].id);
            if(value == null) {
                continue;
            }
            $("#" + quests[i].id + " input[value=" + value + "]").prop('checked', true);
        }
    }

    // On ready load all saved answer
    loadChoices();

    function submitAnswer(callback) {

        // JSON syntax
        // "answer":[
        //     {"id":"1", "answer":"A"},
        //     {"id":"2", "answer":"C"},
        //     {"id":"42",`"answer":"B"}
        // ]

        var $answer = [];
        var $exam_id = $('#exam_id').val();

        $('.question').each(function() {
            var question_answer = {};
            var id = this.id;
            question_answer['id'] = id;
            question_answer['answer'] = $(this).find('[name='+id+'-ch]:checked').val();

            // Just insert the data of question that have answer
            // to lighten the load of server>
            if(question_answer['answer']) {
                $answer.push(question_answer);
            }
        });


        $.ajax({
            async: false,
            type: 'POST',
            url : '/user/exam/submit',
            data: {
                answers: $answer,
                exam_id: $exam_id
            },
            success: function() {
                callback();
            },
            error: function() {
                alert('Gagal menyimpan jawaban, harap ulangi klik tombol. Jika hal ini terus terjadi segera hubungi Admin.');
            }
        });
    }

    $('#exam-paper').submit(function(e) {
        e.preventDefault();
        var self = this;

        submitAnswer(self.submit());
    });

    $('.subject-link').on('click', function(e) {
        e.preventDefault();
        var self = this;

        submitAnswer(function() {
            window.location = self.href;
        });
    });
})
