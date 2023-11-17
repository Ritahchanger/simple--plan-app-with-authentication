const deleteButton = document.querySelectorAll(".delete");
const deleteModal = document.querySelector(".delete_modal");

deleteButton.forEach(deleteButton => {

    deleteButton.addEventListener("click", (e) => {

        deleteModal.style.display = "Flex";

        const cancelModel = document.querySelector(".cancel_button");

        cancelModel.onclick = () => {

            deleteModal.style.display = "none";

        }

    });

});