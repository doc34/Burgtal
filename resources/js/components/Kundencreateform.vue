<template>
  <div class="card">
    <div class="card-header bg-transparent">
      <h4>Kunden Anlegen</h4>
      <div class="form-row">
        <div class="custom-control custom-checkbox m-3">
          <input
            type="checkbox"
            class="custom-control-input"
            :class="classkundenconf"
            id="customControlValidation1"
            required
            v-model="kundenconf"
          />
          <label class="custom-control-label" for="customControlValidation1">Kunde</label>
          <div class="invalid-feedback">Bitte Kunden Art aussuchen</div>
        </div>

        <div class="custom-control custom-checkbox m-3">
          <input
            type="checkbox"
            class="custom-control-input"
            :class="classlieferantconf"
            id="customControlValidation2"
            required
            v-model="lieferantconf"
          />
          <label class="custom-control-label" for="customControlValidation2">Lieferant</label>
          <div class="invalid-feedback">Bitte Kunden Art aussuchen</div>
        </div>
      </div>
    </div>
    <div v-if="showform === true" class="card-body">
      <div class="card-text">
        <form @submit.prevent="addPost">
          <div class="row">
            <div class="form-group col-md-4 col-sm-12">
              <label for="exampleFormControlSelect1">Anrede</label>
              <select
                class="custom-select mr-sm-2"
                :class="classanrede"
                id="exampleFormControlSelect1"
                v-model="confanrede"
              >
                <option
                  v-for=" anrede in anrede.data.anrede "
                  :key="anrede.id"
                  :value="anrede.id"
                >{{anrede.anrede}}</option>
              </select>
            </div>

            <div class="form-group col-md-4 col-sm-12">
              <label for="exampleFormControlSelect1">Partner-Typ</label>
              <select
                class="custom-select mr-sm-2"
                :class="classpartnertypeid"
                id="exampleFormControlSelect1"
                v-model="confpartnertypeid"
              >
                <option
                  v-for=" partnertype in partnertyp.data.partnertype "
                  :key="partnertype.id"
                  :value="partnertype.id"
                >{{partnertype.partnertyp}}</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputFirma">Alias-Name (Geschäftsname, Marke, ...)</label>
              <input
                type="text"
                class="form-control"
                id="inputFirma"
                placeholder="Alias"
                v-model="query.alias"
              />
            </div>

            <div class="form-group col-md-4">
              <label for="inputName">Name</label>
              <input
                type="text"
                class="form-control"
                :class="classname "
                id="inputName"
                placeholder="Name"
                v-model="confname"
              />
            </div>

            <div class="form-group col-md-4">
              <label for="inputVorname">Vorname</label>
              <input
                type="text"
                class="form-control"
                :class="classvorname"
                id="inputVorname"
                placeholder="Vorname"
                v-model="confvorname"
              />
            </div>
          </div>

          <div class="form-group">
            <label for="inputAddress">Strasse</label>
            <input
              type="text"
              class="form-control"
              :class="classstrasse"
              id="inputAddress"
              placeholder="1234 Main St"
              v-model="confstrasse"
            />
          </div>

          <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputplz">PLZ</label>
              <input
                type="text"
                class="form-control"
                :class="classplz"
                id="inputplz"
                v-model="confplz"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputORT">Ort</label>
              <input
                type="text"
                class="form-control"
                :class="classort"
                id="inputORT"
                v-model="confort"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputland">Land</label>
              <select class="custom-select mr-sm-2" id="inputLand" v-model="query.land_id">
                <option v-for="land in land.data.land" :key="land.id" :value="land.id">{{land.land}}</option>
              </select>
            </div>

            <div class="form-group col-md-4 col-sm-12">
              <label for="inputTelefon">Telefon</label>
              <input
                type="text"
                class="form-control"
                id="inputTelefon"
                placeholder="0258745800"
                v-model="query.tel"
              />
            </div>

            <div class="form-group col-md-4 col-sm-12">
              <label for="inputHandy">Handy</label>
              <input
                type="text"
                class="form-control"
                id="inputHandy"
                placeholder="0258745800"
                v-model="query.handy"
              />
            </div>
            <div class="form-group col-md-4 col-sm-12">
              <label for="inputMail">E-Mail</label>
              <input
                type="e-mail"
                class="form-control"
                id="inputMail"
                placeholder="Mail"
                v-model="query.email"
              />
            </div>
          </div>
          <!-- Firma Form -->
          <div v-if="showfirma === true">
            <div class="row">
              <div class="form-group col-md-4 col-sm-12">
                <label for="inputHandy">Steuernummer</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputHandy"
                  placeholder="0258745800"
                  v-model="query.steuernummer"
                />
              </div>
              <div class="form-group col-md-4 col-sm-12">
                <label for="inputHandy">Amtsgericht</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputHandy"
                  placeholder="0258745800"
                  v-model="query.amsgericht"
                />
              </div>
              <div class="form-group col-md-4 col-sm-12">
                <label for="inputHandy">Handelsregister-Nummer</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputHandy"
                  placeholder="0258745800"
                  v-model="query.handelnummer"
                />
              </div>
            </div>
            <div class="row">
              <div class="custom-control custom-switch form-group col-md-4 col-sm-12 mt-3">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" />
                <label
                  class="custom-control-label"
                  for="customSwitch1"
                >Umsatzsteuerpflichtig Ja/Nein</label>
              </div>
              <div class="form-group col-md-4 col-sm-12">
                <label for="inputHandy">Umsatzsteuer-ID</label>
                <input type="text" class="form-control" id="inputHandy" placeholder="DE123458" />
              </div>
              <div class="form-group col-md-4 col-sm-12">
                <label for="exampleFormControlSelect1">Rechtsform</label>
                <select
                  class="custom-select mr-sm-2"
                  id="exampleFormControlSelect1"
                  v-model="query.rechtsform_id"
                >
                  <option
                    v-for="rechtsform in rechtsform.data.rechtsform "
                    :key="rechtsform.id"
                    :value="rechtsform.id"
                  >{{ rechtsform.recht_cod + '- '+ rechtsform.rechtform}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="customRadioInline1"
                name="customRadioInline1"
                class="custom-control-input"
                v-model="page"
                value="newprojekt"
              />
              <label class="custom-control-label" for="customRadioInline1">Neues Projekt</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input
                type="radio"
                id="customRadioInline2"
                name="customRadioInline1"
                class="custom-control-input"
                v-model="page"
                value="kunden"
              />
              <label class="custom-control-label" for="customRadioInline2">Kunden</label>
            </div>
          </div>

          <button
            v-if="classanrede == 'is-valid' && classpartnertypeid=='is-valid' && classname == 'is-valid' && classvorname == 'is-valid'
                && classstrasse == 'is-valid' && classplz == 'is-valid' && classort == 'is-valid' "
            type="submit"
            class="btn btn-primary"
          >Sign in</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      kundenconf: false,
      classkundenconf: "is-invalid",
      lieferantconf: false,
      classlieferantconf: "is-invalid",
      confanrede: "",
      classanrede: "is-invalid",
      confpartnertypeid: "",
      classpartnertypeid: "is-invalid",
      confname: "",
      classname: "is-invalid",
      confvorname: "",
      classvorname: "is-invalid",
      confanrede: "",
      classstrasse: "is-invalid",
      confstrasse: "",
      confplz: "",
      classplz: "is-invalid",
      confort: "",
      classort: "is-invalid",
      showfirma: false,
      showbutton: "0",
      showform:false,
      page: "",
      rkundennum: "",
      kunden: {
        type: String,
        data: {},
        default() {
          return "none";
        }
      },
      land: {
        type: String,
        data: {},
        default() {
          return "none";
        }
      },
      partnertyp: {
        type: String,
        data: {},
        default() {
          return "none";
        }
      },
      rechtsform: {
        type: String,
        data: {},
        default() {
          return "none";
        }
      },
      anrede: {
        type: String,
        data: {},
        default() {
          return "none";
        }
      },
      query: {},
      posts: {},
      info: {},
      name: "",
      description: "",
      output: ""
    };
  },
  created: function() {
    this.Landget();
    this.Kundenget();
    this.Partnertypget();
    this.Rechtsformget();
    this.Anredeget();
  },

  watch: {
    kundenconf: function(val, oldVal) {
      if (val == false && this.lieferantconf == false) {
        this.classkundenconf = "is-invalid";
        this.classlieferantconf = "is-invalid";
        this.query.kundenconf = 0;
        this.showform = false;
      } else {
        this.classkundenconf = "is-valid";
        this.classlieferantconf = "is-valid";
        this.query.kundenconf = 1;
        this.showform = true;
      }



    },
    lieferantconf: function(val, oldVal) {
      if (val == false && this.kundenconf == false) {
        this.classlieferantconf = "is-invalid";
        this.classkundenconf = "is-invalid";
        this.query.lieferantenconf = 0;
        this.showform = false;
      } else {
        this.classlieferantconf = "is-valid";
        this.classkundenconf = "is-valid";
        this.query.lieferantenconf = 1;
         this.showform = true;
      }

    },
    confname: function(val, oldVal) {
      if (this.confname.length >= 2) {
        this.classname = "is-valid";
        this.query.name = this.confname;
      } else {
        this.classname = "is-invalid";
        this.query.name = "";
      }
    },
    confvorname: function(val, oldVal) {
      if (this.confvorname.length >= 2) {
        this.classvorname = "is-valid";
        this.query.vorname = this.confvorname;
      } else {
        this.classvorname = "is-invalid";
        this.query.vorname = "";
      }
    },
    confanrede: function() {
      if (this.confanrede >= 1) {
        this.classanrede = "is-valid";
        this.query.anredeid = this.confanrede;
      } else {
        this.classanrede = "is-invalid";
        this.showbutton--;
      }
      if (this.confanrede == 4) {
        this.showfirma = true;
      } else {
        this.showfirma = false;
      }
    },
    confpartnertypeid: function() {
      if (this.confpartnertypeid >= 1) {
        this.classpartnertypeid = "is-valid";
        this.query.partnertypeid = this.confpartnertypeid;
      } else {
        this.classpartnertypeid = "is-invalid";
      }
    },
    confstrasse: function(val, oldVal) {
      if (this.confstrasse.length >= 3) {
        this.classstrasse = "is-valid";
        this.query.strasse = this.confstrasse;
      } else {
        this.classstrasse = "is-invalid";
      }
    },
    confplz: function(val, oldVal) {
      if (this.confplz.length == 5) {
        this.classplz = "is-valid";
        this.query.plz = this.confplz;
      } else {
        this.classplz = "is-invalid";
      }
    },
    confort: function(val, oldVal) {
      if (this.confort.length >= 3) {
        this.classort = "is-valid";
        this.query.ort = this.confort;
      } else {
        this.classort = "is-invalid";
      }
    },
    page: function(val, oldval) {
      this.query.page = val;
    },
    rkundennum: function(val, oldval) {
      this.postroute(this.page, val);
    }
  },

  computed: {},
  methods: {
    Kundenget() {
      axios.get("/Kunden").then(response => (this.kunden = response));
      this.query.kundenconf = 0;
      this.query.lieferantenconf = 0;
    },
    Landget() {
      axios.get("/land").then(response => (this.land = response));
    },
    Partnertypget() {
      axios.get("/partnertype").then(response => (this.partnertyp = response));
    },
    Rechtsformget() {
      axios.get("/rechtsform").then(response => (this.rechtsform = response));
    },
    Anredeget() {
      axios.get("/api/anrede").then(response => (this.anrede = response));
      this.page = "newprojekt";
    },
    addPost() {
      let uri = "/api/create/kunde";
      axios.post(uri, this.query).then(response => {
        //this.posts = response.data;
        this.page = response.data.page;
        this.rkundennum = response.data.kundennum;
      });
    },
    postroute(page, val) {
      //this.$router.push({ name: page , query: { kundennum:  val }})
      if (this.page === "newprojekt") {
        this.$router.push({
          name: "newprojekt",
         params: { kundennum: this.rkundennum, page: this.page }
        });
      }
    }
  },

  filters: {},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
