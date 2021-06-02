import { HttpClient, HttpRequest } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  usuario:any;
  alumnosCot:any[] = [];
  materias:any[] = [];
  cotutorias:any[] = [];
  alumnos:any[] = [];
  informesAlumno:any[] = [];

  constructor(public auth:AuthService, private http:HttpClient) { }
  
  init(){
      this.getProfesorByEmail(this.auth.email);
      this.getPartesCotutorias();
      this.getMaterias();
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

  getAlumnos(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/alumnos', false);
    let fuera = this;
    console.log("ge");
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.alumnos = JSON.parse(xhr.response);
        console.log(fuera.alumnos);
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
    console.log("getPartesCot");
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.cotutorias = JSON.parse(xhr.response);
        console.log("getPartesCot");
      }else{
        console.log("Error")
      }
    }
    xhr.onerror = function(){
      console.log("Error en la llamada");
    }
    xhr.send();
  }

  getInformesDia(fecha:string, idAlumno:string){
    console.log(fecha);
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/cotutoriasAlumnoFecha/'+idAlumno+'/'+fecha, false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.informesAlumno = JSON.parse(xhr.response);
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
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/materias', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        console.log(JSON.parse(xhr.response))
        fuera.materias = JSON.parse(xhr.response);
      }else{
        console.log("Error")
      }
    }
    xhr.onerror = function(){
      console.log("Error en la llamada");
    }
    xhr.send();
  }

  createParte(idalumno:string, idprofesor:string, idmateria:string, fecha:string, hora:string, actitud:string, comportamiento:string){
    
    this.http.post<any>('https://cpd.iesgrancapitan.org:9123/cotutorias/crear', {"idAlumno": idalumno,"idProfesor": idprofesor,"idMateria": idmateria,"fecha": fecha,"hora": hora,"idActitud": actitud,"idComportamiento": comportamiento}).subscribe(data => {
    })
  }
}
