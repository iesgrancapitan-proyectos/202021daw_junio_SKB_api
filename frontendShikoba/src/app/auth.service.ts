import { Injectable } from '@angular/core';
import { AngularFireAuth } from "@angular/fire/auth";
import { Router } from '@angular/router';
import * as firebase from 'firebase';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  
  email:string = "";
  constructor(private fire:AngularFireAuth, private router:Router) {
    this.email = localStorage.getItem("email");
  }

  login(){
    this.fire.signInWithPopup(new firebase.default.auth.GoogleAuthProvider()).then(res => {
      console.log("Logeado");
      this.fire.user.subscribe(lg => {
        this.router.navigate(["/index"]);
        localStorage.setItem("email", lg.email)
      })
      
      }, err => {
        console.log("Error al logearse");
      })
  }

  logout(){
    this.fire.signOut().then(res => {
      console.log("Deslogeado");
      localStorage.removeItem("email");
      this.router.navigate(["/home"]);
      }, err => {
        console.log("Error al deslogearse");
      })
  }

  locationCotutorias(){
    this.router.navigate(["/cotutorias"]);
  }

  locationIndex(){
    this.router.navigate(["/index"]);
  }
}
