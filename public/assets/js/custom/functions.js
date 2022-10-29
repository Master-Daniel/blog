const xhttp = new XMLHttpRequest();

//////////// CHECK FILE TYPE ///////////////
export function checkFile(file, filename, data, name, url) {
    return new Promise((resolve, reject) => {
        if (filename != "" || filename != null) {
            let ext = filename.split(".").pop().toLowerCase();
            let extf = ["png", "jpg", "jpeg", "xlsx", "xls", "docx", "pdf"];
            if (extf.includes(ext)) {
                checkFileSize(file, data, name, url).then((echo) => {
                    resolve(echo);
                }).catch((error) => {
                    reject(error);
                });
            } else {
                reject("Image format not supported. Only images with .jpg, .jpeg, .xls, .xlsx and .png format are allowed.");
            }
        }
    });
};

/////////// CHECK FILE SIZE ///////////////
function checkFileSize(file, data, name, url) {
    return new Promise((resolve, reject) => {
        if (file != "" || file != null) {
            let oFReader = new FileReader();
            oFReader.readAsDataURL(file);
            let f = file;
            let fsize = f.size || f.fileSize;
            if (fsize <= 10000000) {
                let formData = new FormData();
                formData.append("file", data[0]);
                formData.append('name', name);
                xhttp.onload = () => {
                    if (xhttp.status === 401) {
                        reject(JSON.parse(xhttp.responseText));
                    } else if (xhttp.status === 200) {
                        resolve(JSON.parse(xhttp.responseText));
                    }
                }
                xhttp.open("POST", `//${window.location.host}${url}`, true);
                xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content );
                xhttp.send(formData);
            } else {
                reject('File size must be at least 10mb');
            }
        }
    })
};

///////// AJAX REQUEST /////////
export function sendData(url, method, data) {
    return new Promise((resolve, reject) => {
        xhttp.open(method, url, true);
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector("[name=csrf-token]").content );
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = () => {
            if (xhttp.readyState === 4) {
                console.log(xhttp.responseText);
                const response = JSON.parse(xhttp.responseText);
                if (xhttp.readyState === XMLHttpRequest.DONE && xhttp.status === 200) {
                    resolve(response);
                } else if (xhttp.readyState === XMLHttpRequest.DONE && xhttp.status === 401) {
                    reject(response);
                }
            }
        };
        xhttp.send(data);
    });
}