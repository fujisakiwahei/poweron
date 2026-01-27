document.addEventListener("DOMContentLoaded", function () {
  // ヘッダーの予約ボタンのクリック処理
  const headerReserveBtn = document.getElementById("header-reserve-btn");
  if (headerReserveBtn) {
    headerReserveBtn.addEventListener("click", function (e) {
      e.preventDefault();

      // ページ内に.reserve-ctaが存在するかチェック
      const reserveSections = document.querySelectorAll(".reserve-cta");

      if (reserveSections.length > 0) {
        // 存在する場合：一番上のセクションにスムーススクロール
        const firstSection = reserveSections[0];
        const headerHeight = document.querySelector(".header")?.offsetHeight || 0;
        const targetPosition = firstSection.getBoundingClientRect().top + window.pageYOffset - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      } else {
        // 存在しない場合：トップページの該当セクションに移動
        const homeUrl = window.location.origin;
        window.location.href = homeUrl + "/#reserve-section";
      }
    });
  }

  // 初期表示時の要素に対応
  const removeMinHeight = () => {
    const elements = document.querySelectorAll(".bookly\\:min-h-full");
    elements.forEach((el) => {
      el.classList.remove("bookly:min-h-full");
    });
  };

  // 「次」という文字を「予約可能日を検索」に書き換える
  const replaceNextText = () => {
    const allElements = document.querySelectorAll("*");
    allElements.forEach((el) => {
      // テキストノードのみを対象にする（子要素を含まない純粋なテキスト）
      const childNodes = Array.from(el.childNodes);
      childNodes.forEach((node) => {
        if (node.nodeType === Node.TEXT_NODE && node.textContent.trim() === "次") {
          node.textContent = "予約可能日を検索";
        }
      });
    });
  };

  // 完了メッセージの後にトップページに戻るボタンを追加
  const addBackToTopButton = () => {
    const booklyBoxes = document.querySelectorAll(".bookly-box");
    booklyBoxes.forEach((box) => {
      const text = box.textContent || "";
      // 完了メッセージが含まれているかチェック
      if (text.includes("ありがとうございました！") && text.includes("予約が完了しました。") && text.includes("当日はお気をつけてお越しください。")) {
        // 既にボタンが追加されているかチェック
        const nextElement = box.nextElementSibling;
        if (!nextElement || !nextElement.classList.contains("back-to-top-button")) {
          // ボタンのHTMLを作成して挿入
          const buttonHTML = `
            <a class="button back-to-top-button" href="${window.location.origin}/">
              <span class="material-symbols-outlined">calendar_clock</span>
              <span class="button__text">トップに戻る</span>
            </a>
          `;
          box.insertAdjacentHTML("afterend", buttonHTML);
        }
      }
    });
  };

  // ハッシュ付きでページにアクセスした場合のスクロール処理
  if (window.location.hash === "#reserve-section") {
    setTimeout(() => {
      const targetSection = document.getElementById("reserve-section");
      if (targetSection) {
        const headerHeight = document.querySelector(".header")?.offsetHeight || 0;
        const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    }, 100);
  }

  // 初回実行
  removeMinHeight();
  replaceNextText();
  addBackToTopButton();

  // 動的に追加される要素を監視
  const observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      if (mutation.addedNodes.length) {
        removeMinHeight();
        replaceNextText();
        addBackToTopButton();
      }
    });
  });

  // 監視を開始
  observer.observe(document.body, {
    childList: true,
    subtree: true,
  });
});
