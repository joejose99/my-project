Imports System.Data.OleDb
Public Class frmComment
    Private status As String
    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try
            Call conns()

            Dim dateapp As String

            If TextBox1.Text = "" Then

                MsgBox("Amount Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If


           

            If TextBox2.Text = "" Then

                MsgBox("Description Can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If
            If TextBox4.Text = "" Then

                MsgBox("Amount in Word can not be Empty", MsgBoxStyle.Information, "Information")
                Exit Sub
            End If

            strconss.Close()

          

            'If rowAcct = 0 Then
            'MsgBox("There is no Money in the Account", MsgBoxStyle.Information, "Information")
            'Exit Sub
            ' End If

            
            status = "Auto"
            
            Call conns()
            Dim dates As Date
            Dim dYear As String
            Dim dMonth As String
            Dim dMonth1 As String = ""
            dates = CDate(DateTimePicker2.Text)

            dateapp = CStr(dates)
            dYear = CStr(DatePart(DateInterval.Year, dates))
            dMonth = Trim(CStr(DatePart(DateInterval.Month, dates)))

            If dMonth = "1" Then
                dMonth1 = "January"
            End If
            If dMonth = "1" Then
                dMonth1 = "January"
            End If
            If dMonth = "2" Then
                dMonth1 = "February"
            End If
            If dMonth = "3" Then
                dMonth1 = "March"
            End If
            If dMonth = "4" Then
                dMonth1 = "Apriel"
            End If
            If dMonth = "5" Then
                dMonth1 = "May"
            End If
            If dMonth = "6" Then
                dMonth1 = "June"
            End If
            If dMonth = "7" Then
                dMonth1 = "July"
            End If
            If dMonth = "8" Then
                dMonth1 = "August"
            End If
            If dMonth = "9" Then
                dMonth1 = "September"
            End If
            If dMonth = "10" Then
                dMonth1 = "October"
            End If
            If dMonth = "11" Then
                dMonth1 = "November"
            End If
            If dMonth = "12" Then
                dMonth1 = "December"
            End If


            Dim sqlString As String = ""
            sqlString = "INSERT INTO  Comment(dpaydate,vYear,vMonth,vUser,vdescrib,vAuto,mAmount) VALUES(" & _
            "'" & dateapp & "'," & _
             "'" & dYear & "'," & _
              "'" & dMonth1 & "'," & _
               "'" & UserN & "'," & _
                "'" & TextBox2.Text.Trim & "'" & "," & _
             "'" & status.Trim & "'" & "," & _
            "" & Me.TextBox1.Text.Trim & "" & ")"

            'comUserSelect = New SqlCommand(sqlString, mycon)
            'comUserSelect.ExecuteNonQuery()

            comUserSelectS = New OleDbCommand(sqlString, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            MsgBox("Data Has been Saved", MsgBoxStyle.DefaultButton1, "Information")
            TextBox2.Text = ""
            TextBox1.Text = ""
            TextBox4.Text = ""
            myAccessReader.Close()
            strconss.Close()
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub frmComment_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load


        Me.Left = 0
        Me.Top = 100
        Me.Width = 601
        Me.Height = 273
        '602, 422
        Me.MdiParent = mdiChurch
    End Sub

    Private Sub butexit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butexit.Click
        Me.Close()
    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        TextBox2.Text = ""
        TextBox2.Text = ""
        TextBox4.Text = ""
    End Sub
End Class