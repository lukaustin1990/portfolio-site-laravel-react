import axios from "axios";
import { createApp } from "vue/dist/vue.esm-bundler.js";

document.addEventListener("DOMContentLoaded", function() {
    const el = document.getElementById("vue-auth-signup");

    if (el) {
        createApp({
            data() {
                return {
                    email: "",
                    password: "",
                    confirmPassword: ""
                };
            },
            methods: {
                submitSignup() {
                    // Get the token from localStorage (if needed for authentication)
                    const tokenApp = window.localStorage.getItem('token')

                    // Web side validation
                    if (this.password.length < 8) {
                        alert("Password must be at least 8 characters long!");
                        return;
                    }

                    if (this.password !== this.confirmPassword) {
                        alert("Passwords do not match!");
                        return;
                    }

                    // Send the POST request to the server
                    axios.post("/register", {
                        withCredentials: true, // include cookies
                        xsrfHeaderName: "X-CSRF-TOKEN", // Laravel expects this header
                        Authorization: "Bearer " + tokenApp, // include CSRF token
                        email: this.email,
                        password: this.password
                    }).then(response => {
                        alert("Signup successful!");
                        // you can also close the modal here if you want
                    }).catch(error => {
                        alert("Signup failed: " + error.response.data.message);
                    });
                }
            }
        }).mount(el);
    }
});