(()=>{"use strict";var e,l={158:()=>{const e=window.React,l=window.wp.blocks,a=window.wp.element,t=(0,a.forwardRef)((function({icon:e,size:l=24,...t},r){return(0,a.cloneElement)(e,{width:l,height:l,...t,ref:r})})),r=window.wp.primitives,n=(0,e.createElement)(r.SVG,{viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,e.createElement)(r.Path,{d:"M17 10h-1.2V7c0-2.1-1.7-3.8-3.8-3.8-2.1 0-3.8 1.7-3.8 3.8v3H7c-.6 0-1 .4-1 1v8c0 .6.4 1 1 1h10c.6 0 1-.4 1-1v-8c0-.6-.4-1-1-1zM9.8 7c0-1.2 1-2.2 2.2-2.2 1.2 0 2.2 1 2.2 2.2v3H9.8V7zm6.7 11.5h-9v-7h9v7z"})),o=window.lClutch.blockEditor,c=window.wp.blockEditor,i=window.wp.components,s=JSON.parse('{"u2":"l-clutch/restricted-area"}');(0,l.registerBlockType)(s.u2,{icon:(0,e.createElement)(t,{icon:n,className:"l-clutch-block-icon"}),edit:function({attributes:l,setAttributes:a}){const t=(0,c.useBlockProps)(),r=e=>{a({...l,readableLineUser:{addedFriend:e}})};return(0,e.createElement)("div",{...t},(0,e.createElement)(c.InspectorControls,null,(0,e.createElement)(i.PanelBody,{title:"制限設定",initialOpen:!0},(0,e.createElement)(i.PanelRow,null,(0,e.createElement)("div",null,(0,e.createElement)("div",{className:"tw-mb-6"},(0,e.createElement)(i.SelectControl,{label:"対象ユーザーに対して、ブロックを",onChange:e=>{a({...l,readable:"true"===e})},value:l.readable,options:[{label:"表示する",value:"true"},{label:"非表示にする",value:"false"}]})),(0,e.createElement)("div",{className:"tw-mb-6"},(0,e.createElement)("h3",null,"対象ユーザー"),[{label:"管理者",value:"administrator"},{label:"編集者",value:"editor"},{label:"著者",value:"author"},{label:"投稿者",value:"contributor"},{label:"閲覧者",value:"subscriber"},{label:"LINEユーザー",value:"l-clutch_line-user"},{label:"非ログインユーザー",value:"not_logged_in"}].map((t=>(0,e.createElement)("fieldset",{className:"tw-mb-2 tw-w-56",key:`target-user-${t.value}`},(0,e.createElement)(i.CheckboxControl,{key:t.value,label:t.label,className:"!tw-mb-2",checked:l.readableRoles.includes(t.value),onChange:e=>((e,t)=>{t&&!l.readableRoles.includes(e)?a({readableRoles:[...l.readableRoles,e]}):!t&&l.readableRoles.includes(e)&&a({readableRoles:l.readableRoles.filter((l=>l!==e))})})(t.value,e)}),"l-clutch_line-user"===t.value&&l.readableRoles.includes(t.value)&&(0,e.createElement)("div",{className:"tw-pl-2"},(0,e.createElement)(i.SelectControl,{label:"LINE公式アカウントの友だち追加状態",value:l.readableLineUser.addedFriend,onChange:r,options:[{label:"すべて",value:"all"},{label:"追加済のみ",value:"added"},{label:"未追加のみ",value:"not_added"}]})))))))))),(0,e.createElement)(o.BlockFrame,{title:"閲覧制限エリア"},(0,e.createElement)(c.InnerBlocks,{template:[["core/paragraph",{}]]})))},save:o.SaveInnerBlocksContent})}},a={};function t(e){var r=a[e];if(void 0!==r)return r.exports;var n=a[e]={exports:{}};return l[e](n,n.exports,t),n.exports}t.m=l,e=[],t.O=(l,a,r,n)=>{if(!a){var o=1/0;for(u=0;u<e.length;u++){for(var[a,r,n]=e[u],c=!0,i=0;i<a.length;i++)(!1&n||o>=n)&&Object.keys(t.O).every((e=>t.O[e](a[i])))?a.splice(i--,1):(c=!1,n<o&&(o=n));if(c){e.splice(u--,1);var s=r();void 0!==s&&(l=s)}}return l}n=n||0;for(var u=e.length;u>0&&e[u-1][2]>n;u--)e[u]=e[u-1];e[u]=[a,r,n]},t.o=(e,l)=>Object.prototype.hasOwnProperty.call(e,l),(()=>{var e={270:0,577:0};t.O.j=l=>0===e[l];var l=(l,a)=>{var r,n,[o,c,i]=a,s=0;if(o.some((l=>0!==e[l]))){for(r in c)t.o(c,r)&&(t.m[r]=c[r]);if(i)var u=i(t)}for(l&&l(a);s<o.length;s++)n=o[s],t.o(e,n)&&e[n]&&e[n][0](),e[n]=0;return t.O(u)},a=globalThis.webpackChunk_l_clutch_scripts=globalThis.webpackChunk_l_clutch_scripts||[];a.forEach(l.bind(null,0)),a.push=l.bind(null,a.push.bind(a))})();var r=t.O(void 0,[577],(()=>t(158)));r=t.O(r)})();