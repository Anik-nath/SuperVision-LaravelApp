@extends('website.layout.main')
@section('main-content')
<div class="content-wrapper">
    <h2>Create a group</h2>
    <form action="/store-test" method="post">
      @csrf
      <div class="form-group">
        <label for="name">Group Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Group Name">
      </div>
      <div class="form-group">
        <label for="totalMembers">Total Members</label>
        <input type="radio" id="totalMembers1" name="totalMembers" value="1" onclick="toggleMemberFields(1)">
        <label for="totalMembers1">1</label>
        <input type="radio" id="totalMembers2" name="totalMembers" value="2" onclick="toggleMemberFields(2)">
        <label for="totalMembers2">2</label>
        <input type="radio" id="totalMembers3" name="totalMembers" value="3" onclick="toggleMemberFields(3)">
        <label for="totalMembers3">3</label>
        <input type="radio" id="totalMembers4" name="totalMembers" value="4" onclick="toggleMemberFields(4)">
        <label for="totalMembers4">4</label>
        <div id="member-fields" style="display: none;">
          <!-- Member fields will be dynamically added here -->
        </div>
      </div>
      <div id="delete-row-buttons" style="display: none;">
       
      </div>
      <button type="submit" class="btn btn-primary">Create Group</button>
    </form>
</div>

<script>
    var memberCount = 0;
    var memberList = {!! json_encode($memberList) !!}; // Assuming $memberList contains the list of members from the user table

    function toggleMemberFields(totalMembers) {
        var memberFields = document.getElementById("member-fields");
        memberFields.innerHTML = ""; // Clear existing member fields

        if (totalMembers > 1) {
            memberFields.style.display = ""; // Show member fields div

            for (var i = 0; i < totalMembers; i++) {
                addMemberRow();
            }
        } else if (totalMembers === 1) {
            memberFields.style.display = ""; // Show member fields div

            addMemberRow();
        } else {
            memberFields.style.display = "none"; // Hide member fields div
        }
    }

    function addMemberRow() {
        var memberFields = document.getElementById("member-fields");

        var row = document.createElement("div");
        row.className = "row";

        var col1 = document.createElement("div");
        col1.className = "col";
        var memberSelect = document.createElement("select"); // Use a select dropdown to choose a member
        memberSelect.className = "form-control";
        memberSelect.name = "member-name[]";

        memberSelect.addEventListener("change", function () {
            var selectedMemberId = this.options[this.selectedIndex].getAttribute('data-member-id');
            var memberIdInput = this.parentNode.nextElementSibling.firstChild;
            memberIdInput.value = selectedMemberId;
            
        });

        var defaultOption = document.createElement("option");
        defaultOption.innerHTML = "Select Member";
        defaultOption.disabled =true;
        memberSelect.appendChild(defaultOption);
        memberList.forEach(function (member) {
            var option = document.createElement("option");
            option.innerHTML = member.username;
            option.setAttribute("data-member-id", member.student_id);
            memberSelect.appendChild(option);
        });
        col1.appendChild(memberSelect);
        
        

        var col2 = document.createElement("div");
        col2.className = "col";
        var memberIdInput = document.createElement("input");
        memberIdInput.type = "text";
        memberIdInput.className = "form-control";
        memberIdInput.name = "member-id[]";
        memberIdInput.placeholder = "Member ID";
        col2.appendChild(memberIdInput);
        console.log(memberIdInput);

        var label = document.createElement("label");
        label.innerHTML = "Member " + (++memberCount);

        var col3 = document.createElement("div");
        col3.className = "col";
        var deleteButton = document.createElement("button");
        deleteButton.type = "button";
        deleteButton.className = "btn btn-danger";
        deleteButton.innerHTML = "Delete Row";
        deleteButton.addEventListener("click", function () {
            deleteMemberRow(row);
        });
        col3.appendChild(deleteButton);

        row.appendChild(label);
        row.appendChild(col1);
        row.appendChild(col2);
        row.appendChild(col3);

        memberFields.appendChild(row);
    }

    function deleteMemberRow(row) {
        var memberFields = document.getElementById("member-fields");
        memberFields.removeChild(row);
        memberCount--;
    }
</script>

@stop
