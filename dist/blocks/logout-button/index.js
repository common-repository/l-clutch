(()=>{"use strict";var t,e={586:()=>{const t=window.React,e=window.wp.blocks,r=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"l-clutch/logout-button","version":"0.1.0","title":"LINEログアウトボタン","category":"l-clutch","description":"ログアウトを実行するボタンです。ログインしていない場合は表示されません。","attributes":{"text":{"type":"string","default":"ログアウト","source":"html","selector":"a"}},"supports":{"align":["wide","full"],"color":{"gradients":true},"typography":{"fontSize":true,"lineHeight":true},"shadow":true,"spacing":{"padding":["horizontal","vertical"],"margin":["top","bottom"]},"layout":{"allowOrientation":false,"allowVerticalAlignment":false,"allowSwitching":false,"allowInheriting":false,"default":{"type":"flex","justifyContent":"center"}}},"styles":[{"name":"fill","label":"Fill"},{"name":"outline","label":"Outline","isDefault":true}],"example":{"attributes":{"text":"ログアウト"}},"textdomain":"l-clutch","editorScript":"file:./index.js","editorStyle":["l-clutch-block-editor"],"style":["file:./style-index.css","wp-block-button"],"render":"file:./render.php"}'),o=window.wp.blockEditor,l=window.lClutch.blockEditor;(0,e.registerBlockType)(r,{icon:(0,t.createElement)("span",{className:"dashicon dashicons dashicons-exit l-clutch-block-icon"}),edit:function({attributes:e,setAttributes:r}){const{blockProps:i,wrapperProps:n,buttonProps:a}=(0,l.useCoreButtonProps)({attributes:e});return(0,t.createElement)("div",{...i},(0,t.createElement)("div",{...n},(0,t.createElement)(o.RichText,{onChange:t=>{t=t.replace(/(\r?\n)|(<br\/?>)/g," "),r({...e,text:t})},value:e.text,withoutInteractiveFormatting:!0,identifier:"text",tagName:"a",...a})))},save:function({attributes:e}){const{blockProps:r,wrapperProps:i,buttonProps:n}=l.useCoreButtonProps.save({attributes:e});return(0,t.createElement)("div",{...r,style:{display:"none"}},(0,t.createElement)("div",{...i},(0,t.createElement)(o.RichText.Content,{tagName:"a",value:e.text,href:"#logout"})))}})}},r={};function o(t){var l=r[t];if(void 0!==l)return l.exports;var i=r[t]={exports:{}};return e[t](i,i.exports,o),i.exports}o.m=e,t=[],o.O=(e,r,l,i)=>{if(!r){var n=1/0;for(u=0;u<t.length;u++){for(var[r,l,i]=t[u],a=!0,s=0;s<r.length;s++)(!1&i||n>=i)&&Object.keys(o.O).every((t=>o.O[t](r[s])))?r.splice(s--,1):(a=!1,i<n&&(n=i));if(a){t.splice(u--,1);var c=l();void 0!==c&&(e=c)}}return e}i=i||0;for(var u=t.length;u>0&&t[u-1][2]>i;u--)t[u]=t[u-1];t[u]=[r,l,i]},o.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),(()=>{var t={545:0,746:0};o.O.j=e=>0===t[e];var e=(e,r)=>{var l,i,[n,a,s]=r,c=0;if(n.some((e=>0!==t[e]))){for(l in a)o.o(a,l)&&(o.m[l]=a[l]);if(s)var u=s(o)}for(e&&e(r);c<n.length;c++)i=n[c],o.o(t,i)&&t[i]&&t[i][0](),t[i]=0;return o.O(u)},r=globalThis.webpackChunk_l_clutch_scripts=globalThis.webpackChunk_l_clutch_scripts||[];r.forEach(e.bind(null,0)),r.push=e.bind(null,r.push.bind(r))})();var l=o.O(void 0,[746],(()=>o(586)));l=o.O(l)})();