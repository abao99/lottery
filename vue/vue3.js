Vue.config.debug = true;
Vue.config.devtools = true;

var app = new Vue({
  el: '#app',
  data: {
    projects: [  //���
      {
        name: 'AngularJS',
        site: 'http://angularjs.org',
        description: 'HTML enhanced for web apps!'
      },
      {
        name: 'Angular',
        site: 'http://angular.io',
        description: 'One framework. Mobile and desktop.'
      },
      {
        name: 'jQuery',
        site: 'http://jquery.com/',
        description: 'Write less, do more.'
      },
      {
        name: 'Backbone',
        site: 'http://backbonejs.org/',
        description: 'Models for your apps.'
      },
      {
        name: 'SproutCore',
        site: 'http://sproutcore.com/',
        description: 'A Framework for Innovative web-apps.'
      }],
    newPj:  //�s�W���
      {
        name: '',
        site: '',
        description: ''
      },
    editPj:  //�ק���
      {
        idx: -1,
        name: '',
        site: '',
        description: ''
      },
    showList: true,
    showAdd: false,
    showEdit: false,
    searchWord: ''
  },
  computed: {
    filterKeyword: function() {  //����r�j�M
      let s = this.searchWord.toLowerCase();  //����p�g
      return this.projects.filter(it => {
        return it.name.toLowerCase().indexOf(s) >= 0;
      })
    }
  },
  methods: {
    goShow(s) {  //�����e��
      this.showList = this.showAdd = this.showEdit = false;
      switch(s) {
        case 'list':  //��^�C��
          this.showList = true;
          break;
        case 'new':  //�s�W
          this.newPj.name = '';
          this.newPj.site = '';
          this.newPj.description = '';
          this.showAdd = true;
          break;
        case 'edit':  //�ק�
          this.showEdit = true;
          break;
      }
    },
    addProject() {  //����s�W���
      this.projects.push({
        name: this.newPj.name,
        site: this.newPj.site,
        description: this.newPj.description
      });
      this.goShow('list');
    },
    editProject(p,i) {  //�����ק�e��
      this.editPj.idx = i;  //�ĴX��
      this.editPj.name = p.name;
      this.editPj.site = p.site;
      this.editPj.description =  p.description;
      this.goShow('edit');
    },
    saveProject() {  //�x�s�ק�
      this.projects[this.editPj.idx].name = this.editPj.name;
      this.projects[this.editPj.idx].site = this.editPj.site;
      this.projects[this.editPj.idx].description = this.editPj.description;
      this.editPj = {};
      this.goShow('list');
    },
    delProject(p) {  //�R�����
      this.projects = this.projects.filter(it => {
        return it !== p;
      });
      /*
      let rows = [];
      this.projects.forEach(it => {
        if (it !== p) {
          rows.push(it);
        }
      });
      this.projects = rows;
      */
      
    }
  }
})
