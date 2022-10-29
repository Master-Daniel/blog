import * as functions from './functions.js';

const create_new_category = document.getElementById('create_new_category'), modalTitle = document.querySelector('.modal-title'), modalBody = document.querySelector('.modal-body'), host = `//${window.location.host}`, loader = `<img src="${host}/assets/img/loader.gif" style="width: 20px; height: 20px;" />`, delete_category = document.querySelectorAll('#delete_category'), edit_category = document.querySelectorAll('#edit_category'), post_sumary = document.getElementById('post_summary'), delete_post = document.querySelectorAll('#delete_post'), add_new_post = document.getElementById('add_new_post');

if (add_new_post != null || add_new_post != undefined) {
    add_new_post.onclick = async (e) => {
        e.preventDefault();
        add_new_post.innerHTML = loader
        let data = {
            title: document.getElementById('post_title').value,
            body: document.getElementById('post_summary').value,
            url: `${window.location.host}/posts/details/${document.getElementById('post_title').value.replace(' ', '-')}`
        }
        functions.sendData("https://notify.softdeltanija.com/subscribe", 'POST', data).then((response) => {
            console.log(response);
        }).catch((error) => {
            console.log(error);
        })
        // document.getElementById('post_form').submit();
    }
}

if (post_sumary != null || post_sumary != undefined) {
    post_sumary.onkeyup = () => {
        var characters = post_sumary.value.length;
        var maxlen = 255;
        var countlast = Math.ceil(maxlen - characters);
        if (characters > maxlen) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'This field text is too long!',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                onOpen: function() {
                    var maanlms = document.getElementById("myAudio");
                    maanlms.play(); 
                }
            })
            $('#submit').prop("disabled",true);
            $("#count").css("color","red").css("background-color","yellow");
        }else{
            $('#submit').prop("disabled",false);
            $("#count").css("color","green");
            $("#count").css("background-color","#D4FCF6");
        }
        $("#count").text(`Characters: ${countlast}`);
    };
} else {
    console.log('not selected');
}

////////// CREATE POST CATEGORY /////////////////
if (create_new_category != null || create_new_category != undefined) {
    create_new_category.onclick = () => {
        modalTitle.innerHTML = 'Create Category';
        modalBody.innerHTML = `
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" placeholder="Enter Category Name" />
            </div>
            <div class="form-group">
                <label for="category_slug">Category Slug</label>
                <input type="text" class="form-control" id="category_slug" placeholder="Enter Category Slug" />
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-primary" id="create">Create</button>
            </div>
        `;
        $('#modal').modal('show');
        const create = document.getElementById('create'), category_name = document.getElementById('category_name'), category_slug = document.getElementById('category_slug');
        create.onclick = () => {
            if (category_name.value == '') {
                category_name.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';
                category_name.focus();
            } else if (category_slug.value == '') {
                category_slug.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';
                category_slug.focus();
            } else {
                create.innerHTML = `${loader}`
                create.disabled = true;
                functions.sendData(`//${window.location.host}/dashboard/category/create`, 'POST', `category_name=${category_name.value}&category_slug=${category_slug.value}`).then((response) => {
                    EliteCodec.Toast(`<h5>Success</h5><p>${response.message}</p>`, "success", { position: "top-right" });
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                }).catch((error) => {
                    create.innerHTML = `Create`
                    create.disabled = false;
                    EliteCodec.Toast(`<h5>Error!</h5><p>${error.message}</p>`, "error", { position: "top-right" });
                })
            }
        }
    }
}

/////////// EDIT CATEGORY ///////////////
if (edit_category != null || edit_category != undefined) {
    edit_category.forEach((val) => {
        val.onclick = () => {
            val.innerHTML = `${loader}`;
            let category = val.getAttribute('data-id');
            functions.sendData(`//${window.location.host}/dashboard/category/edit/${category}`, 'GET', '').then((response) => {
                val.innerHTML = 'Edit';
                val.disabled = false;
                modalTitle.innerHTML = 'Edit Category';
                modalBody.innerHTML = `
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" value="${response.category.category_name}" id="category_name" placeholder="Enter Category Name" />
                    </div>
                    <div class="form-group">
                        <label for="category_slug">Category Slug</label>
                        <input type="text" class="form-control" value="${response.category.category_slug}" id="category_slug" placeholder="Enter Category Slug" />
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" id="create">Create</button>
                    </div>
                `;
                $('#modal').modal('show');
                const create = document.getElementById('create'), category_name = document.getElementById('category_name'), category_slug = document.getElementById('category_slug');
                create.onclick = () => {
                    if (category_name.value == '') {
                        category_name.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';
                        category_name.focus();
                    } else if (category_slug.value == '') {
                        category_slug.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';
                        category_slug.focus();
                    } else {
                        create.innerHTML = `${loader}`
                        create.disabled = true;
                        functions.sendData(`//${window.location.host}/dashboard/category/update`, 'POST', `category=${category}&category_name=${category_name.value}&category_slug=${category_slug.value}`).then((response) => {
                            EliteCodec.Toast(`<h5>Success</h5><p>${response.message}</p>`, "success", { position: "top-right" });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        }).catch((error) => {
                            create.innerHTML = `Edit`
                            create.disabled = false;
                            EliteCodec.Toast(`<h5>Error!</h5><p>${error.message}</p>`, "error", { position: "top-right" });
                        })
                    }
                }
            }).catch((error) => {
                val.innerHTML = 'Edit';
                val.disabled = false;
                EliteCodec.Toast(`<h5>Error!</h5><p>${error.message}</p>`, "error", { position: "top-right" });
            })
        }
    })
}

/////////// DELETE CATEGORY //////////
if (delete_category != null || delete_category != undefined) {
    delete_category.forEach((val) => {
        val.onclick = (e) => {
            let category = val.getAttribute('data-id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
            }).then(function (result) {
                if (result.value) {
                    functions.sendData(`//${window.location.host}/dashboard/category/delete/${category}`, 'GET', '').then((response) => {
                        val.innerHTML = `Delete`
                        val.disabled = false;
                        EliteCodec.Toast(`<h5>Success</h5><p>${response.message}</p>`, "success", { position: "top-right" });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }).then((error) => {
                        val.innerHTML = `Delete`
                        val.disabled = false;
                        EliteCodec.Toast(`<h5>Error!</h5><p>${error.message}</p>`, "error", { position: "top-right" });
                    })
                }
            })
            e.preventDefault();
        }
    })
}

/////////////// DELETE POST //////////////////
if (delete_post != null || delete_post != undefined) {
    delete_post.forEach((val) => {
        val.onclick = (e) => {
            let post = val.getAttribute('data-id');
            console.log(post);
            // Swal.fire({
            //     title: "Are you sure?",
            //     text: "You won't be able to revert this!",
            //     icon: "warning",
            //     showCancelButton: true,
            //     confirmButtonText: "Yes, delete it!",
            // }).then(function (result) {
            //     if (result.value) {
            //         functions.sendData(`/dashboard/posts/delete/${post}`, 'GET', '').then((response) => {
            //             val.innerHTML = `Delete`
            //             val.disabled = false;
            //             EliteCodec.Toast(`<h5>Success</h5><p>${response.message}</p>`, "success", { position: "top-right" });
            //             setTimeout(() => {
            //                 window.location.reload();
            //             }, 2000);
            //         }).then((error) => {
            //             val.innerHTML = `Delete`
            //             val.disabled = false;
            //             EliteCodec.Toast(`<h5>Error!</h5><p>${error.message}</p>`, "error", { position: "top-right" });
            //         })
            //     }
            // })
            e.preventDefault();
        }
    })
} else {
    console.log('not selected');
}