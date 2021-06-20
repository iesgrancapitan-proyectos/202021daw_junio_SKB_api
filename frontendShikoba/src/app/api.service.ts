import { HttpClient, HttpRequest } from '@angular/common/http';
import { i18nMetaToJSDoc } from '@angular/compiler/src/render3/view/i18n/meta';
import { Injectable } from '@angular/core';
import { fileURLToPath } from 'url';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  usuario:any;
  alumnosCot:any[] = [];
  alumnosCotSoloAlumnos:any[]= []
  materias:any[] = [];
  cotutorias:any[] = [];
  alumnos:any[] = [];
  informesAlumno:any[] = [];
  busqueda:any[] = [];
  conductas:any[] =[];
  cursos:any[] = [];

  constructor(public auth:AuthService, private http:HttpClient) { }
  
  init(){
    if(this.auth.cookies.get("email") == ""){
      this.auth.relocate("home")
    }else{
      this.getProfesorByEmail(this.auth.cookies.get("email"));
      this.getPartesCotutorias();
      this.getAlumnos();
      this.setBusqueda(this.cotutorias);
      this.getMaterias();
      this.getConductas();
      this.getCursos();
    }
    
  }

  getCursos(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/cursos', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.cursos = JSON.parse(xhr.response);
      }else{
      }
    }
    xhr.onerror = function(){
    }
    xhr.send();
  }
  
  getNombreCurso(idCurso:string){
    for(let curso of this.cursos){
      if(curso.id == idCurso){
        return curso.grupo;
      }
    }
    return "";
  }

  getProfesorByEmail(email:string){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/profesores/email/'+email, false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.usuario = JSON.parse(xhr.response);
        fuera.getAlumnosCotutorizados(localStorage.getItem("email"));
      }else{
      }
    }
    xhr.onerror = function(){
    }
    xhr.send();
  }

  getAlumnos(){
    var xhr = new XMLHttpRequest();
    let fuera = this;
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/alumnos', false);
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.alumnos = JSON.parse(xhr.response);
      }else{
      }
    }
    xhr.onerror = function(){

    }
    xhr.send();
  }

  getBusqueda(busqueda:string, criterio:any){
    let array = [];
    for(let alumno of criterio){
      let nombreCompleto = (alumno.nombre+" "+alumno.apellido1+" "+alumno.apellido2).toLowerCase( );
      nombreCompleto = nombreCompleto.replace(/á/g, 'a');
      nombreCompleto = nombreCompleto.replace(/é/g, 'e');
      nombreCompleto = nombreCompleto.replace(/í/g, 'i');
      nombreCompleto = nombreCompleto.replace(/ó/g, 'o');
      nombreCompleto = nombreCompleto.replace(/ú/g, 'u');
      nombreCompleto = nombreCompleto.replace(/ü/g, 'u');
      if(nombreCompleto.includes(busqueda.toLowerCase( ))){
        array.push(this.alumnos.find(x => x.id == alumno.id));
      }
    }
    return array;
  }

  buscarCurso(busqueda:string, criterio:any){
    let array = [];
    for(let alumno of criterio){
      for(let curso of this.cursos){   
        if(curso.grupo.toLowerCase( ).includes(busqueda.toLowerCase( )) && curso.id == alumno.idCurso){
          array.push(alumno);
        }
      }
      
    }
    
    return array;
  }

  setBusqueda(busqueda:any){
    this.busqueda = busqueda;
  }

  soloCotutorias(busqueda:any){
    let array = [];
    
    for(let resultado of busqueda){
      //console.log("id:"+alumno.id+" "+alumno.nombre+" "+alumno.apellido1+" "+alumno.apellido2)
      if(this.cotutorias.find(x => x.id == resultado.id) != undefined){
        array.push(this.cotutorias.find(x => x.id == resultado.id))
      }
    }
    return array;
  }

  getAlumnosCotutorizados(email:string){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/profesores/'+this.usuario.id+'/cotutorias', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        let array =  [];
        fuera.alumnosCot = JSON.parse(xhr.response);
        for(let alumno of JSON.parse(xhr.response)){
          array.push(alumno.idAlumno);
        }

        fuera.alumnosCotSoloAlumnos = array;
      }else{
      }
    }
    xhr.onerror = function(){
    }
    xhr.send();
  }

  getPartesCotutorias(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/cotutorias', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        let array = [];
        for(let cotutoria of JSON.parse(xhr.response)){
          array.push(cotutoria.idAlumno);
        }
        fuera.cotutorias = array;
      }else{
      }
    }
    xhr.onerror = function(){
    }
    xhr.send();
  }

  getInformesDia(fecha:string, idAlumno:string){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/cotutoriasAlumnoFecha/'+idAlumno+'/'+fecha, false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.informesAlumno = JSON.parse(xhr.response);
      }else{
      }
    }
    xhr.onerror = function(){
    }
    xhr.send();
  }

  getMaterias(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/materias', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.materias = JSON.parse(xhr.response);
      }else{
      }
    }
    xhr.onerror = function(){
    }
    xhr.send();
  }

  createIndicacion(idalumno:string, idprofesor:string, idmateria:string, fecha:string, hora:string, actitud:string, comportamiento:string){
    this.http.post<any>('https://cpd.iesgrancapitan.org:9123/cotutorias/crear', {
      "idAlumno": idalumno,
      "idProfesor": idprofesor,
      "idMateria": idmateria,
      "fecha": fecha,
      "hora": hora,
      "idActitud": actitud,
      "idComportamiento": comportamiento}).subscribe(data => {
    })
  }

  createParte(fecha:string, descripcion:string, tareas:string, idalumno:string, idprofesor:string, expulsion:boolean){
    let fechasplit = fecha.split("-");
    this.http.post<any>('https://cpd.iesgrancapitan.org:9123/crearParte', {
      "fecha": fecha+" 00:00:00",
      "idProfesor": idprofesor,
      "horaSalidaAula": "00:00:00",
      "horaLlegadaJefatura": "00:00:00",
      "observacion":"",
      "puntos":0,
      "recupera":0,
      "fechaComunicacion":fechasplit[4]+"-"+fechasplit[2]+"-"+fechasplit[0],
      "idalumno": idalumno,
      "descripcion": descripcion,
      "tareas": tareas}).subscribe(data => {
    })
  }

  getConductas(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://cpd.iesgrancapitan.org:9123/conductas', false);
    let fuera = this;
    xhr.onload = function(){
      if(xhr.status >= 200 && xhr.status < 400){
        fuera.conductas = JSON.parse(xhr.response);
      }else{
      }
    }
    xhr.onerror = function(){
    }
    xhr.send();
  }
}
