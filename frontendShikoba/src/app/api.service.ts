import { HttpClient, HttpRequest } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  partes:any[] = [];
  usuario:any;
  alumnosCot:any[] = [];
  materias:any[] = [];
  cotutorias:any[] = [];

  constructor(public auth:AuthService) { }
  
  getPartes(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/profesores/121/partes', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.partes = JSON.parse(xhr.response);
        fuera.getProfesorByEmail(fuera.auth.email);
        fuera.getPartesCotutorias();
        //fuera.getMaterias();
      }else{
        console.log("Error")
      }
    }
    xhr.onerror = function(){
      console.log("Error en la llamada");
    }
    xhr.send();
  }

  getProfesorByEmail(email:string){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/profesores/email/'+email, false);
    
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.usuario = JSON.parse(xhr.response);
        fuera.getAlumnosCotutorizados(fuera.auth.email);
      }else{
        console.log("Error")
      }
    }
    xhr.onerror = function(){
      console.log("Error en la llamada");
    }
    xhr.send();
  }

  getAlumnosCotutorizados(email:string){
    var xhr = new XMLHttpRequest();
    console.log("Id:"+this.usuario.id)
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/profesores/'+this.usuario.id+'/cotutorias', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.alumnosCot = JSON.parse(xhr.response);
        console.log(fuera.alumnosCot)
      }else{
        console.log("Error")
      }
    }
    xhr.onerror = function(){
      console.log("Error en la llamada");
    }
    xhr.send();
  }

  getPartesCotutorias(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/cotutorias', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.cotutorias = JSON.parse(xhr.response);
      }else{
        console.log("Error")
      }
    }
    xhr.onerror = function(){
      console.log("Error en la llamada");
    }
    xhr.send();
  }

  getMaterias(){
    //
  }

  createParte(idalumno:string, idprofesor:string, idmateria:string, fecha:string, hora:string, actitud:string, comportamiento:string){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "https://cpd.iesgrancapitan.org:9123/cotutorias?idAlumno="+idalumno+"&idProfesor="+idprofesor+"&idMateria="+idmateria+"&fecha="+fecha+"&hora="+hora+"&actitud="+actitud+"&comportamiento="+comportamiento, false);
    
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        console.log("Insertado con exito");
      }else{
        console.log("Error")
      }
    }
    xhr.onerror = function(){
      console.log("Error en la llamada");
    }
    xhr.send();
  }
}
