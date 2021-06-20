import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';
import { AuthService } from '../auth.service';


@Component({
  selector: 'app-partes',
  templateUrl: './partes.component.html',
  styleUrls: ['./partes.component.css']
})
export class PartesComponent implements OnInit {

  constructor(public api:ApiService, public auth:AuthService) { }

  mostrarAlumnos:boolean = false;
  mostrarForm:boolean = true;
  salir:boolean = true;

  mostrarConductas:boolean = true;
  enviado:boolean = true;

  nombre:string = "";
  idAlumno:string ="";
  descripcion:string = "";
  tareas:string = "";
  fecha:string;
  expulsion:boolean;


  busqueda:string = "";
  cond:string = "";

  ngOnInit(): void{
    if(this.auth.cookies.get("relocate") == "unproper" && this.auth.cookies.get("location") != "partes"){
      this.auth.relocate(this.auth.cookies.get("location"));
    }
    this.auth.cookies.set("location", "partes")
    this.auth.cookies.delete("relocate");

    this.api.init();
    this.api.setBusqueda(this.api.alumnos);

  }

  logout(){
    this.auth.logout();
  }

  cancelar(){
    if(this.salir){
      this.salir = false
    }else{
      this.salir = true;
    }
  }


  verConductas(){
    if(this.mostrarConductas){
      this.mostrarConductas = false;
    }else{
      this.mostrarConductas = true;
    }
  }


  accedeAlumno(busqueda:any){
    this.nombre = busqueda.nombre+" "+busqueda.apellido1+" "+busqueda.apellido2;
    this.idAlumno = busqueda.id;
    this.cambiarVista();
  }

  cambiarVista(){
    if(this.mostrarAlumnos){
      this.mostrarAlumnos = false;
      this.mostrarForm = true;
    }else{
      this.mostrarAlumnos = true;
      this.mostrarForm = false;
    }
    this.auth.cookies.set("relocate", "unproper")
  }

  enviar(){
    //this.api.createParte(this.fecha, this.descripcion, this.tareas, this.idAlumno, this.api.usuario.id, this.expulsion)
    //this.cambiarVista();
    this.enviado = false;
  }

  refresh(){
    window.location.reload();
  }

  buscar(busqueda:string){
    this.busqueda = busqueda;
    if(busqueda == ""){
      this.api.setBusqueda(this.api.alumnos);
    }else{
      //let arrayBusqueda =
      let search = this.api.getBusqueda(this.busqueda, this.api.alumnos);
      if(search.length < 1){ 
        search = this.api.buscarCurso(this.busqueda, this.api.alumnos);
      }
      this.api.setBusqueda(search);
    }
    
  }
}
