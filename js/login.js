const register_button = document.getElementById("register_button")

const login_button = document.getElementById("login_button")

const login_sub = document.getElementById("login_sub")

register_button.addEventListener("click", e=> {
    document.getElementById("login").style.display = "none"
    document.getElementById("register").style.display = "block"
    // document.getElementsByClassName("main-card")[0].style.flexDirection = "row-reverse"

    register_button.style.display = "none"
    login_button.style.display = "block"
})






login_button.addEventListener("click", e=> {
    document.getElementById("register").style.display = "none"
    document.getElementById("login").style.display = "block"
    // document.getElementsByClassName("main-card")[0].style.flexDirection = "row"

    login_button.style.display = "none"
    register_button.style.display = "block"
})

// login_sub.addEventListener("click", e => {
//     e.preventDefault()
//     const passwordRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
//     const email = document.getElementById("login_email")
//     console.log(email.value)
//     console.log(!passwordRegex.test(email.value))
//     if(!passwordRegex.test(email.value)) {
//         alert("Enter a corrent email")
//     }
// })

