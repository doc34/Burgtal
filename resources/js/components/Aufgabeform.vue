<template>
  <div>
    <auftraginfo :auftrag="aufgabenumm.auftragnummer"></auftraginfo>

    <!-- auftraginfo ende -->
    <div class="card w-100 bg-transparent">
      <div class="card card-header bg-transparent">
        <h5 v-if="$route.query.aufgabe" class="card-title">{{ header}}</h5>
        <h5 v-else class="card-title">{{'Aufgabe'}}</h5>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" @click.prevent="showkontaktinfo=true " href="#">Kontakte Hinzufügen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" @click.prevent="showcreateaufgabe = true" href="#">Neue Aufgabe</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              @click.prevent="showkopierenaufgabe = true"
              href="#"
            >Aufgabe Kopieren</a>
          </li>
        </ul>
      </div>
    </div>
    <div v-if="showcreateaufgabe === true" class="card">
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputTitele">Titel</label>
            <input
              type="text"
              class="form-control"
              id="inputTitele"
              placeholder="Aufgabe Titel"
              v-model="aquery.titel"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="inputBeschreibung">Beschreibung</label>
            <textarea
              type="text"
              class="form-control"
              id="inputBeschreibung"
              placeholder="Beschreibung"
              v-model="aquery.beschreibung"
            />
          </div>
          <div class="form-group col-md-6">
            <label for="inputInfo">Info</label>
            <textarea
              type="text"
              class="form-control"
              id="inputInfo"
              placeholder="Info"
              v-model="aquery.info"
            />
          </div>
        </div>
        <button
          type="button"
          class="btn btn-outline-primary"
          @click.prevent="addreateauftragnummer()"
        >Speichern</button>
      </div>
    </div>

    <div class="card" v-if="$route.query.aufgabe">
      <form @submit.prevent="addPost">
        <div class="card card-header">
          <label class="sr-only" for="inlineFormInputGroup">Material</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="material-icons input-group-text">search</div>
              <span class="input-group-text">{{mtotal}}</span>
            </div>
            <input
              ref="search"
              type="text"
              class="form-control"
              id="inlineFormInputGroup"
              placeholder="Material"
              v-model="searchQuery"
            />
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 col-sm-12">
              <label for="inputMaterial">Material</label>
              <select
                v-if="material.material"
                class="custom-select"
                :class="classmaterial"
                :size="materialshow"
                id="inputMaterial"
                v-model="mid"
              >
                <option
                  v-for="material in material.material.data"
                  :value="material.id"
                  :key="material.id"
                  @click="showmaterialid=material.id"
                >{{material.material}}</option>
              </select>
            </div>

            <div class="form-group col-md-1">
              <label for="inputName">Stark</label>
              <select
                v-if="stark.stark"
                class="custom-select"
                :class="classstark"
                id="inputMaterial"
                name="id"
                v-model="starkid"
              >
                <option
                  v-for="stark in stark.stark"
                  :value="stark.id"
                  :key="stark.id"
                >{{stark.stark+ 'cm'}}</option>
              </select>
            </div>

            <div class="form-group col-md-1">
              <label for="inputart">Art</label>
              <select
                v-if="art.art"
                class="custom-select"
                :class="classart"
                id="inputart"
                v-model="artid"
              >
                <option v-for="art in art.art" :value="art.id" :key="art.id">{{ art.art}}</option>
              </select>
            </div>
            <div class="card-body form-group col-md-2">
              <div class="custom-control custom-switch">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  id="customVorderkante"
                  checked="checked"
                  select
                  v-model="VK"
                />
                <label class="custom-control-label" for="customVorderkante">Vorderkante</label>
              </div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customUmKopf" v-model="UK" />
                <label class="custom-control-label" for="customUmKopf">Umkopf R+L</label>
              </div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customAlle" v-model="AK" />
                <label class="custom-control-label" for="customAlle">Alle Seiten</label>
              </div>
            </div>
            <div class="card-body form-group col-md-2">
              <div class="custom-control custom-switch">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  id="customLinksKopf"
                  v-model="KL"
                />
                <label class="custom-control-label" for="customLinksKopf">Kopf Links</label>
              </div>
              <div class="custom-control custom-switch">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  id="customRechtsKopf"
                  v-model="KR"
                />
                <label class="custom-control-label" for="customRechtsKopf">Kopf Rechts</label>
              </div>
            </div>
            <div class="card-body form-group col-md-2">
              <div class="custom-control custom-switch">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  id="customHinterkante"
                  v-model="KH"
                />
                <label class="custom-control-label" for="customHinterkante">Hinterkante</label>
              </div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSkizze" v-model="SK" />
                <label class="custom-control-label" for="customSkizze">Skizze</label>
              </div>
            </div>
            <div class="card bg-transparent border-0">
              <div class="card-body">
                <div class="form-group col-md-2">
                  <img :src="'/storage/img/'+svgimg" class="card-img svd-img" alt="..." />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-if="error" class="card">
          <div class="card-header text-white bg-danger">
            <h4>{{error}}</h4>
          </div>
        </div>
        <div class="form-row ml-3">
          <div class="form-group col-md-2 col-sm-12">
            <label for="inputFirma">Nummer</label>
            <input
              ref="nummer"
              type="text"
              class="form-control"
              id="inputFirma"
              placeholder="1"
              v-model="nummber"
            />
          </div>
          <div class="form-group col-md-1 col-sm-12">
            <label for="inputFirma">Stück</label>
            <input
              type="number"
              class="form-control"
              id="inputFirma"
              placeholder="1"
              v-model="query.stuck"
            />
          </div>

          <div class="form-group col-md-2">
            <label for="inputName">länge</label>
            <input
              type="text"
              class="form-control"
              :class=" classleange"
              id="inputName"
              placeholder="cm"
              v-model="query.leange"
            />
          </div>

          <div class="form-group col-md-2">
            <label for="inputVorname">Breite</label>
            <input
              type="text"
              class="form-control"
              :class="classbreite"
              id="inputVorname"
              placeholder="cm"
              v-model="query.breite"
            />
          </div>
          <div class="form-group col-md-1">
            <label for="input"></label>
            <button id="input" type="submit" class="form-control btn btn-primary mt-2">Sign in</button>
          </div>
        </div>
      </form>
    </div>

    <!-- table -->
    <div class="card">
      <div class="card-body">
        <table class="table table-sm">
          <thead>
            <tr>
              <th scope="col">Material</th>
              <th scope="col">Nr</th>

              <th scope="col">länge</th>
              <th scope="col">Breite</th>
              <th scope="col">Kanten</th>
              <th scope="col">qm</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="aufgabenliste in aufgabenliste.aufgabelist" :key="aufgabenliste.id">
              <td>{{aufgabenliste.material+ ' '+ aufgabenliste.stark + 'cm ' + aufgabenliste.art }}</td>
              <td>{{aufgabenliste.a_num}}</td>

              <td>{{aufgabenliste.laenge}}</td>
              <td>{{aufgabenliste.breite}}</td>
              <td>
                <img :src="aufgabenliste.svgpath" class="svgimg" alt />
              </td>
              <td>{{aufgabenliste.qm}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<style >
.svgimg {
  width: 95px;
  height: 25px;
}
.svd-img {
  width: 160px;
  height: 45px;
}
</style>
<script>
import svgpage from "./svg.vue";
import Auftraginfo from "./Auftraginfo.vue";
export default {
  data: function() {
    return {
        header:'',
      aufgabe: "",
      showcreateaufgabe: false,
      card: false,
      error: "",
      searchQuery: "",
      aufgabenumm: {},
      material: {},
      showmaterialid: "",
      materialshow: "5",
      stark: {},
      art: {},
      //   projektid: "2",
      aufgabenliste: {},
      VK: true,
      UK: true,
      AK: false,
      KL: false,
      KR: false,
      KH: false,
      SK: false,
      mid: false,
      stuck: "",
      nummber: "1",
      leange: "",
      breite: "",
      artid: "",
      starkid: "",
      countliste: "",
      materialname: "",
      artname: "",
      starkname: "",
      query: {
        stuck: "1"
      },
      aquery: {},
      searchQuery: " ",
      name: "",
      mtotal: "0",
      svgimg: "Standart.svg",
      imgpath: "/storage/img/",
      standart: "Standart.svg",
      AKimg: "Standardall.svg",
      VKUKRK: "StandardVKRK.svg",

      showpost: false,

      classmaterial: "is-invalid",
      classstark: "is-invalid",
      classart: "is-invalid",
      classleange: "",
      classbreite: ""
    };
  },
  components: {
    Auftraginfo
  },

  beforeCreate: function() {},

  created: function() {
    this.Stark();
    this.Art();
    this.postqueryshow();
    this.addinfoauftragnummer();
  },

  watch: {
    searchQuery: function(val, oldVal) {
      this.searchQuerypost();
      this.materialshow = "5";
    },
    AK: function(val, oldVal) {
      if (val === true) {
        this.VK = true;
        this.KH = true;
        this.KL = true;
        this.KR = true;
        this.SK = false;
        this.UK = false;
      }
      this.svgshow();
    },
    UK: function(val, oldVal) {
      if (val === true && this.KL === true && this.KR === true) {
        this.KL = false;
        this.KR = false;
        this.AK = false;
        this.KH = false;
        this.VK = true;
      }
      if (val === true && this.KL === false && this.KR === false) {
        this.KL = false;
        this.KR = false;
        this.AK = false;
        this.KH = false;
        this.VK = true;
        this.UK = true;
      }

      this.svgshow();
    },
    KL: function(val, oldval) {
      if (val === true && this.KR === true) {
        this.UK = false;
      }
      this.svgshow();
    },
    KR: function(val, oldval) {
      if (val === true && this.KL === true) {
        this.UK = false;
      }
      this.svgshow();
    },
    KH: function(val, oldval) {
      this.svgshow();
    },
    VK: function(val, oldval) {
      if (val === false) {
        this.AK = false;
      }

      this.svgshow();
    },
    countliste: function(val, oldval) {
      this.nummber = val + 1;
      this.query.breite = "";
      this.query.leange = "";

      this.query.stuck = "1";
    },
    showmaterialid: function(val, oldval) {
      this.materialshow = "1";
      this.classmaterial = "is-valid";
      this.postshow();
    },
    starkid: function(val, oldval) {
      if (this.starkid >= 1) {
        this.classstark = "is-valid";
      } else {
        this.classstark = "is-invalid";
      }
      this.postshow();
      this.starkeach(val);
    },
    artid: function(val, oldval) {
      if (this.artid >= 1) {
        this.classart = "is-valid";
      } else {
        this.classart = "is-invalid";
      }
      this.query.artid = this.artid;
      this.postshow();
      this.arteach(val);
    },
    mid: function(val, oldval) {
      if (val > 0) {
        this.materialeach(val);
      }
    },
    "$route.query.aufgabe"() {
      this.aufgabe = this.$route.query.aufgabe;
      this.postqueryshow(this.$route.query.aufgabe);
      this.eachauftrag(this.$route.query.aufgabe);
    }
  },

  computed: {},
  methods: {
    Stark() {
      axios.get("/stark").then(response => (this.stark = response.data));
    },
    Art() {
      axios.get("/art").then(response => (this.art = response.data));
    },

    addinfoauftragnummer() {
      let uri;
      this.aquery.projekt_id = this.$route.query.projekt;
      this.aufgabe = this.$route.query.aufgabe;

      uri = "/api/info/aufgabenummer";

      axios
        .post(uri, "projekt_id=" + this.$route.query.projekt)
        .then(response => (this.aufgabenumm = response.data));
    },
    addreateauftragnummer() {
      let uri;
      this.aquery.aufgabeteile_id = this.$route.query.aufgabe;

      uri = "/api/create/aufgabenummer";

      axios
        .post(uri, this.aquery)
        .then(response => (this.aufgabe = response.data));

      this.showcreateaufgabe = false;
      this.addinfoauftragnummer();
    },

    searchQuerypost() {
      let uri;
      uri = "/api/searchQuery/material";

      axios
        .post(uri, "suchen=" + this.searchQuery)
        .then(
          response => (
            (this.material = response.data),
            (this.mtotal = response.data.material.total)
          )
        );
    },
    postshow: function() {
      if (
        this.projektid >= 1 &&
        this.starkid >= 1 &&
        this.mid >= 1 &&
        this.artid >= 1
      ) {
        this.showpost = true;
      }
    },

    addPost: function() {
      let uri;
      this.query.leange = this.query.leange.replace(",", ".") * 1000;
      this.query.breite = this.query.breite.replace(",", ".") * 1000;
      this.query.aufgabeteile_id = this.$route.query.aufgabe;

      this.query.materialid = this.mid;
      this.query.starkid = this.starkid;
      this.query.artid = this.artid;
      this.query.projektid = this.$route.query.projekt;
      this.query.UK = this.UK;
      this.query.VK = this.VK;
      this.query.KL = this.KL;
      this.query.KR = this.KR;
      this.query.KH = this.KH;
      this.query.SK = this.SK;
      this.query.svgpath = this.svgimg;
      this.query.leange = this.query.leange;
      this.query.breite = this.query.breite;
      this.query.nummber = this.nummber;
      uri = "/api/create/aufgabeliste";

      axios
        .post(uri, this.query)
        .then(
          response => (
            (this.aufgabenliste = response.data),
            (this.countliste = response.data.aufgabelist.length)
          )
        );

      this.$refs.nummer.focus();
    },
       eachauftrag(val) {
      let aufgabenum;
      let titel;
         this.aufgabenumm.auftragnummer.forEach((value, index) => {
           if (val == value.teile_id) {
             aufgabenum = value.teilenum;
              titel = value.titel;

           }


         });
//this.header = val;
this.header = "Bearbeite: " + titel + " Augabe: " + aufgabenum;

    },

    posterror: function() {
      if (this.query.leange === "") {
        this.classleange = "is-invalid";
      }

      if (this.query.breite === "") {
        this.classbreite = "is-invalid";
      }
    },

    postqueryshow: function(val) {
      let uri;

      uri = "/api/show/queryshow";

      axios
        .post(uri, "aufgabeteile_id=" + this.aufgabe)
        .then(
          response => (
            (this.aufgabenliste = response.data),
            (this.countliste = response.data.aufgabelist.length)
          )
        );
    },

    svgshow: function() {
      let standart = "Standart.svg";
      let AKimg = "Standardall.svg";
      let VKRK = "VKRK.svg";
      let VKRKLK = "VKRKLK.svg";
      let VKLK = "VKLK.svg";
      let VKLKUK = "VKLKRU.svg";
      let VKRKUK = "VKRKRU.svg";
      let VKRKHK = "VKRKHK.svg";
      let VKHK = "VKHK.svg";
      let VKLKHK = "VKLKHK.svg";
      let VK = "VK.svg";
      let OK = "OK.svg";
      let KR = "KR.svg";
      let KL = "KL.svg";
      let KLKR = "KLKR.svg";

      if (this.UK === true && this.KR === false && this.KL === false) {
        this.svgimg = standart;
      }

      if (
        this.UK === false &&
        this.KR === true &&
        this.KL === false &&
        this.KH === false &&
        this.VK === true
      ) {
        this.svgimg = VKRK;
      }
      if (
        this.UK === false &&
        this.KR === true &&
        this.KL === true &&
        this.KH === true
      ) {
        this.svgimg = AKimg;
      }
      if (
        this.VK === true &&
        this.KR === true &&
        this.KL === true &&
        this.KH === false
      ) {
        this.svgimg = VKRKLK;
      }
      if (
        this.VK === true &&
        this.KR === false &&
        this.KL === true &&
        this.KH === false &&
        this.UK === true
      ) {
        this.svgimg = VKLK;
      }
      if (
        this.VK === true &&
        this.KR === false &&
        this.KL === true &&
        this.KH === false &&
        this.UK === true
      ) {
        this.svgimg = VKLKUK;
      }
      if (
        this.VK === true &&
        this.KR === true &&
        this.KL === false &&
        this.KH === false &&
        this.UK === true
      ) {
        this.svgimg = VKRKUK;
      }

      if (
        this.VK === true &&
        this.KR === true &&
        this.KL === false &&
        this.KH === true &&
        this.UK === false
      ) {
        this.svgimg = VKRKHK;
      }
      if (
        this.VK === true &&
        this.KR === false &&
        this.KL === false &&
        this.KH === true &&
        this.UK === false
      ) {
        this.svgimg = VKHK;
      }
      if (
        this.VK === true &&
        this.KR === false &&
        this.KL === true &&
        this.KH === true &&
        this.UK === false
      ) {
        this.svgimg = VKLKHK;
      }
      if (
        this.VK === false &&
        this.KR === true &&
        this.KL === false &&
        this.KH === true &&
        this.UK === false
      ) {
        this.svgimg = VKLK;
      }
      if (
        this.VK === false &&
        this.KR === false &&
        this.KL === true &&
        this.KH === true &&
        this.UK === false
      ) {
        this.svgimg = VKRK;
      }
      if (
        this.VK === true &&
        this.KR === false &&
        this.KL === false &&
        this.KH === false &&
        this.UK === false
      ) {
        this.svgimg = VK;
      }
      if (
        this.VK === false &&
        this.KR === false &&
        this.KL === false &&
        this.KH === true &&
        this.UK === false
      ) {
        this.svgimg = VK;
      }

      if (
        this.VK === false &&
        this.KR === false &&
        this.KL === false &&
        this.KH === false &&
        this.UK === false
      ) {
        this.svgimg = OK;
      }
      if (
        this.VK === false &&
        this.KR === true &&
        this.KL === false &&
        this.KH === false &&
        this.UK === false
      ) {
        this.svgimg = KR;
      }
      if (
        this.VK === false &&
        this.KR === false &&
        this.KL === true &&
        this.KH === false &&
        this.UK === false
      ) {
        this.svgimg = KL;
      }

      if (
        this.VK === false &&
        this.KR === true &&
        this.KL === true &&
        this.KH === false &&
        this.UK === false
      ) {
        this.svgimg = KLKR;
      }
      if (
        this.VK === false &&
        this.KR === true &&
        this.KL === true &&
        this.KH === true &&
        this.UK === false
      ) {
        this.svgimg = VKRKLK;
      }
    },
    materialeach: function(val) {
      this.material.material.data.forEach((value, index) => {
        if (val == value.id) {
          this.materialname = value.material;
        }
      });
    },

    starkeach: function(val) {
      this.stark.stark.forEach((value, index) => {
        if (val == value.id) {
          this.materialname = this.materialname + " " + value.stark + "cm";
        }
        // this.materialname= this.materialname +
      });
    },
    arteach: function(val) {
      this.art.art.forEach((value, index) => {
        if (val == value.id) {
          this.materialname = this.materialname + " " + value.art;
        }
        // this.materialname= this.materialname +
      });
    }
  },

  filters: {
    bemassung: function(val) {
      return val + " cm";
    },


  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
