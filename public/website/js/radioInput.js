$(document).ready(function () {
    $("#addbtn00").click(function () {
        var val = parseInt($(".astro:checked").val()) + 1,
            str = "";

        for (var i = 1; i < val; i++) {
            str +=
                ' <label for="" class="control-label mt-3">' +
                "Member " +
                i +
                "</label>";
            //   str+='<div><input type="text" name="name' + i + '" id="id' + i + '"/></div>';
            str += `
            <div class="d-flex flex-column justify-content-between gap-2 flex-md-row">
                <input type="text" class="new-border form-control form-control-lg" name="mem_name" placeholder="Enter Name">
                <input type="text" class="new-border form-control form-control-lg" name="mem_id" placeholder="Enter Student Id">
                <input type="text" class="new-border form-control form-control-lg" name="mem_section" placeholder="Enter Section">
            </div>
          `;
        }

        $("#mem-container").html(str);
        if(val){
            $("#reset").removeClass("d-none");
        }
    });
    // for reset button
    $("#reset").click(function () {
                str = "";
                $("#mem-container").html(str);
                $("#reset").addClass("d-none");
                if($(radio).data('wasChecked')){
                    radio.checked = false;
                }
                
    });

    // var i = 0;
    // $("#addbtn").click(function () {
    //     ++i;
    //     $("#mem-container").append(`
    //     <div id="parent">
    //     <label id="label" for="" class="control-label mt-3">Member ${i}</label>
    //         <div class="d-flex flex-column justify-content-between gap-2 flex-md-row">
    //             <input type="text" class="new-border form-control form-control-lg" name="mem_name" placeholder="Enter Name">
    //             <input type="text" class="new-border form-control form-control-lg" name="mem_id" placeholder="Enter Student Id">
    //             <input type="text" class="new-border form-control form-control-lg" name="mem_section" placeholder="Enter Section">
    //             <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
    //         </div>
    //     </div>
    //     `);
    // });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).parents('#parent').remove();
    // });

            $ii = 2;
            $("#addBtn").click(function () {
                $sib = $(this).siblings();
                $value = $sib.val();
                $taskDescription=$(this).parent().siblings().val();
                console.log($value);
                console.log($taskDescription);
                $(`<div class="mb-3" id="${$ii}">
                        <input id="input${$ii}"  type="text" class="g form-control mb-1" name="task[]" placeholder="write a task here...">
                        <textarea class="form-control " name="description[]" id="description${$ii}" placeholder="add description here..." rows="3"></textarea>
                </div>`).insertBefore($('#assignTask').children().last().prev());

                $(`#input${$ii}`).val($value);
                $(`#description${$ii}`).val($taskDescription);
                $(this).parent().siblings().val('');
                $sib.val('');
                $ii++;
            });
    
    
});


// @for ($i = 0; $i < $singleGroup->total_member; $i++)
// <label for="" class="control-label mt-3">Member {{$i+1}}</label>
// <div class="d-flex flex-column justify-content-between gap-2 flex-md-row">
//     <input type="text" class="new-border form-control form-control-lg" name="mem_name" placeholder="Enter Name">
//     <input type="text" class="new-border form-control form-control-lg" name="mem_id" placeholder="Enter Student Id">
//     <input type="text" class="new-border form-control form-control-lg" name="mem_section" placeholder="Enter Section">
// </div>
// @endfor        